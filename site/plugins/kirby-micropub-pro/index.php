<?php

use Kirby\Http\Response;

Kirby::plugin('custom/micropub-pro', [
    'routes' => [
        [
            'pattern' => 'micropub',
            'method'  => 'GET|POST',
            'action'  => function () {

                // ----------------------------------------------------
                // Logging
                // ----------------------------------------------------
                $log = function ($msg) {
                    file_put_contents(
                        kirby()->root('site') . '/logs/micropub.log',
                        $msg . "\n",
                        FILE_APPEND
                    );
                };

                $log("=== MICROPUB REQUEST ===");
                $log("POST: " . print_r($_POST, true));
                $log("FILES: " . print_r($_FILES, true));
                $log("RAW: " . file_get_contents('php://input'));

                // ----------------------------------------------------
                // Parse input
                // ----------------------------------------------------
                $contentType = $_SERVER['CONTENT_TYPE'] ?? '';

                if (str_starts_with($contentType, 'multipart/form-data')) {
                    $input = $_POST;
                    $files = $_FILES;
                } elseif (str_starts_with($contentType, 'application/x-www-form-urlencoded')) {
                    $input = $_POST;
                    $files = [];
                } else {
                    $raw   = file_get_contents('php://input');
                    $input = json_decode($raw, true) ?? [];
                    $files = [];
                }

                $props = $input['properties'] ?? [];

                // ----------------------------------------------------
                // Extract categories → tags
                // ----------------------------------------------------
                $categories = [];

                $extractCats = function ($value) use (&$categories) {
                    if (is_string($value)) {
                        $categories[] = $value;
                    } elseif (is_array($value)) {
                        foreach ($value as $v) {
                            if (is_string($v)) {
                                $categories[] = $v;
                            }
                        }
                    }
                };

                if (isset($input['category'])) {
                    $extractCats($input['category']);
                }
                if (isset($props['category'])) {
                    $extractCats($props['category']);
                }

                $categories = array_unique($categories);

                // ----------------------------------------------------
                // Extract photos (Micropub supports strings OR objects)
                // ----------------------------------------------------
                $photoUrls = [];
                $photoAlts = [];

                $extractPhoto = function ($item) use (&$photoUrls, &$photoAlts) {
                    if (is_string($item)) {
                        $photoUrls[] = $item;
                        $photoAlts[] = null;
                    } elseif (is_array($item) && isset($item['value'])) {
                        $photoUrls[] = $item['value'];
                        $photoAlts[] = $item['alt'] ?? null;
                    }
                };

                if (isset($input['photo'])) {
                    foreach ((array)$input['photo'] as $p) {
                        $extractPhoto($p);
                    }
                }

                if (isset($props['photo'])) {
                    foreach ((array)$props['photo'] as $p) {
                        $extractPhoto($p);
                    }
                }

                // ----------------------------------------------------
                // Determine post type
                // ----------------------------------------------------
                $isCheckin = isset($props['checkin']);
                $isNote    = isset($input['content']) || isset($props['content'][0]);
                $hasPhotos = !empty($photoUrls) || isset($files['photo']);

                if (!$isCheckin && !$isNote && !$hasPhotos) {
                    return new Response(
                        json_encode(['error' => 'Unsupported Micropub post type']),
                        'application/json',
                        400
                    );
                }

                // ----------------------------------------------------
                // Parent page
                // ----------------------------------------------------
                $parent = $isCheckin ? site()->page('checkins') : site()->page('notes');

                if (!$parent) {
                    return new Response(
                        json_encode(['error' => 'Parent page not found']),
                        'application/json',
                        500
                    );
                }

                // ----------------------------------------------------
                // YAML structure wrapper
                // ----------------------------------------------------
                $wrapYaml = function ($data) {
                    if (!$data || !is_array($data)) {
                        return '';
                    }

                    // Convert h-card/h-adr into YAML structure format
                    $yaml = "-\n";
                    foreach ($data as $key => $value) {
                        if (is_array($value)) {
                            $yaml .= "  $key:\n";
                            foreach ($value as $sub) {
                                if (is_array($sub)) {
                                    // Nested array → encode as JSON string
                                    $yaml .= "    - " . json_encode($sub, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n";
                                } else {
                                    $yaml .= "    - $sub\n";
                                }
                            }
                        } else {
                            $yaml .= "  $key: $value\n";
                        }
                    }

                    return $yaml;
                };

                // ----------------------------------------------------
                // Build content
                // ----------------------------------------------------
                if ($isCheckin) {
                    $checkin = $props['checkin'][0] ?? [];
                    $venue   = $checkin['properties']['name'][0] ?? 'Check-in';

                    $title    = $venue;
                    $text     = "Checked in at $venue";
                    $date     = $props['published'][0] ?? date('Y-m-d H:i:s');
                    $template = 'checkin';

                } else {
                    $title    = 'Note';
                    $text     = $input['content'] ?? ($props['content'][0] ?? '');
                    $date     = date('Y-m-d H:i:s');
                    $template = 'note';
                }

                // ----------------------------------------------------
                // Create page (branch: checkins vs notes)
                // ----------------------------------------------------
                try {
                    kirby()->impersonate('kirby');

                    if ($isCheckin) {
                        // Extract Micropub h-card + h-adr
                        $checkinCard = $props['checkin'][0] ?? [];
                        $addressCard = $props['location'][0] ?? [];

                        $lat = $checkinCard['properties']['latitude'][0] ?? null;
                        $lon = $checkinCard['properties']['longitude'][0] ?? null;

                        // Stable slug
                        $slug = 'checkin-' . date('Ymd-His', strtotime($date));

                        $page = $parent->createChild([
                            'slug'     => $slug,
                            'template' => 'checkin',
                            'content'  => [
                                'title'         => $title,
                                'text'          => $text,
                                'date'          => $date,
                                'tags'          => !empty($categories) ? implode(', ', $categories) : '',

                                // YAML structure (Kirby-safe)
                                'location_data' => $wrapYaml($checkinCard),
                                'address_data'  => $wrapYaml($addressCard),

                                // Legacy fields
                                'latitude'      => $lat ?? '',
                                'longitude'     => $lon ?? '',
                            ]
                        ]);

                    } else {
                        // Notes use NotePage model
                        $page = NotePage::create([
                            'parent'   => $parent,
                            'template' => $template,
                            'content'  => [
                                'title' => $title,
                                'text'  => $text,
                                'date'  => $date,
                                'tags'  => !empty($categories) ? implode(', ', $categories) : '',
                            ]
                        ]);
                    }

                    // Publish
                    try {
                        $page->changeStatus('listed');
                    } catch (\Throwable $e) {
                        $log('STATUS ERROR: ' . $e->getMessage());
                    }

                } catch (\Throwable $e) {
                    $log('PAGE ERROR: ' . $e->getMessage());
                    return new Response(
                        json_encode(['error' => 'Page creation failed']),
                        'application/json',
                        500
                    );
                }

                // ----------------------------------------------------
                // Handle multipart photo uploads
                // ----------------------------------------------------
                $photoFilenames = [];

                if (isset($files['photo'])) {
                    $photos = $files['photo'];
                    $count  = is_array($photos['name']) ? count($photos['name']) : 1;

                    for ($i = 0; $i < $count; $i++) {
                        $tmp  = is_array($photos['tmp_name']) ? $photos['tmp_name'][$i] : $photos['tmp_name'];
                        $name = is_array($photos['name'])     ? $photos['name'][$i]     : $photos['name'];

                        try {
                            $upload = $page->createFile([
                                'source'   => $tmp,
                                'filename' => $name,
                            ]);

                            $photoFilenames[] = $upload->filename();
                        } catch (\Throwable $e) {
                            $log('UPLOAD FILE ERROR: ' . $e->getMessage());
                        }
                    }
                }

                // ----------------------------------------------------
                // Handle photo URLs
                // ----------------------------------------------------
                foreach ($photoUrls as $i => $url) {
                    $alt = $photoAlts[$i] ?? null;

                    $basename = basename(parse_url($url, PHP_URL_PATH));
                    $tmpPath  = kirby()->root('media') . '/' . uniqid('mp-') . '-' . $basename;

                    $log("DOWNLOADING: $url -> $tmpPath");

                    $data = @file_get_contents($url);

                    if ($data === false) {
                        $log("FAILED DOWNLOAD: $url");
                        continue;
                    }

                    file_put_contents($tmpPath, $data);

                    try {
                        $upload = $page->createFile([
                            'source'   => $tmpPath,
                            'filename' => $basename,
                            'alt'      => $alt,
                        ]);

                        $photoFilenames[] = $upload->filename();
                    } catch (\Throwable $e) {
                        $log('UPLOAD URL ERROR: ' . $e->getMessage());
                    }

                    @unlink($tmpPath);
                }

                // ----------------------------------------------------
                // Update feature_images field
                // ----------------------------------------------------
                if (!empty($photoFilenames)) {
                    try {
                        $page->update([
                            'feature_images' => $photoFilenames,
                        ]);
                    } catch (\Throwable $e) {
                        $log('UPDATE IMAGES ERROR: ' . $e->getMessage());
                    }
                }

                // ----------------------------------------------------
                // Return success
                // ----------------------------------------------------
                return new Response(
                    json_encode([
                        'status' => 'created',
                        'url'    => $page->url(),
                    ]),
                    'application/json',
                    201,
                    ['Location' => $page->url()]
                );
            },
        ],
    ],
]);
