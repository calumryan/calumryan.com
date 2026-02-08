<?php

use Kirby\Cms\Page;

Kirby::plugin('custom/micropub-pro', [
    'routes' => [
        [
            'pattern' => 'micropub',
            'method'  => 'POST',
            'action'  => function () {

                // Decode JSON payload
                $input = json_decode(file_get_contents('php://input'), true);
                if (!$input) {
                    return [
                        'status' => 'error',
                        'message' => 'Invalid JSON payload'
                    ];
                }

                $props = $input['properties'] ?? [];
                $type  = $input['type'][0] ?? 'note';

                // Determine parent page
                $parent = site()->page($type === 'checkin' ? 'checkins' : 'notes');
                if (!$parent) {
                    return [
                        'status' => 'error',
                        'message' => 'Parent page not found'
                    ];
                }

                // Calculate next UID safely
                $childrenUids = $parent->children()->pluck('uid');
                $draftsUids   = $parent->drafts()->pluck('uid');

                // Ensure arrays
                $childrenUids = is_array($childrenUids) ? $childrenUids : $childrenUids->toArray();
                $draftsUids   = is_array($draftsUids) ? $draftsUids : $draftsUids->toArray();

                $uids = array_merge($childrenUids, $draftsUids);
                $nextUid = $uids ? max($uids) + 1 : 1;

                // Title & text
                $title = $type === 'checkin' && !empty($props['checkin'][0]['properties']['name'][0])
                    ? $props['checkin'][0]['properties']['name'][0]
                    : ($props['content'][0] ?? ucfirst($type));

                $text = $type === 'checkin'
                    ? 'Checked in at ' . $title
                    : ($props['content'][0] ?? '');

                // Published date
                $published  = $props['published'][0] ?? date('Y-m-d H:i:s');
                $datePrefix = date('Ymd', strtotime($published));

                // Slug generation with collision check
                $slugBase = $datePrefix . '_' . $nextUid;
                $slug     = $slugBase;
                $counter  = 1;

                while ($parent->children()->find($slug) || $parent->drafts()->find($slug)) {
                    $slug = $slugBase . '-' . $counter;
                    $counter++;
                }

                // Build content array
                $content = [
                    'title'         => $title,
                    'text'          => $text,
                    'date'          => $published,
                    'uid'           => $nextUid,
                    'location_data' => isset($props['checkin'][0]) ? json_encode($props['checkin'][0]) : '',
                    'address_data'  => isset($props['location'][0]) ? json_encode($props['location'][0]) : '',
                    'syndication'   => implode("\n", $props['syndication'] ?? [])
                ];

                // Create child page
                try {
                    $page = $parent->createChild([
                        'slug'     => $slug,
                        'template' => $type === 'checkin' ? 'checkin' : 'note',
                        'status'   => 'draft',
                        'content'  => $content
                    ]);
                } catch (\Exception $e) {
                    return [
                        'status' => 'error',
                        'message' => 'Error creating page: ' . $e->getMessage()
                    ];
                }

                return [
                    'status' => 'created',
                    'url'    => $page->url(),
                    'slug'   => $slug,
                    'uid'    => $nextUid
                ];
            }
        ]
    ]
]);
