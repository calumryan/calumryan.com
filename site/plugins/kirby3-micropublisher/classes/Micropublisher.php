<?php

namespace sgkirby\Micropublisher;

use Kirby\Cms\Page;
use Kirby\Toolkit\Str;

class Micropublisher
{
    public static function handle()
    {
        // Only allow POST requests
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('HTTP/1.1 405 Method Not Allowed');
            exit('Micropub requires POST');
        }

        // -----------------------------
        // Parse the body
        // -----------------------------
        $raw = file_get_contents('php://input');
        $input = json_decode($raw, true);

        // fallback to form-encoded payload
        if (!is_array($input)) $input = $_POST;
        if (!is_array($input)) {
            header('HTTP/1.1 400 Bad Request');
            exit('Invalid Micropub request');
        }

        $props = $input['properties'] ?? [];

        // -----------------------------
        // Published date
        // -----------------------------
        $publishedRaw = $props['published'][0] ?? null;
        try {
            $published = $publishedRaw
                ? (new \DateTime($publishedRaw))->format('Y-m-d H:i:s')
                : date('Y-m-d H:i:s');
        } catch (\Exception $e) {
            $published = date('Y-m-d H:i:s');
        }

        // -----------------------------
        // Venue extraction
        // -----------------------------
        $venue = $props['checkin'][0]['properties']['name'][0] ?? null;
        $venue = $venue ? trim($venue) : null;

        $text = $venue ? 'Checked in at ' . $venue : ($props['content'][0] ?? 'Checked in');
        $title = $venue ?: date('F jS, Y', strtotime($published));

        // -----------------------------
        // Parent page
        // -----------------------------
        $parent = kirby()->page('checkins');
        if (!$parent) {
            header('HTTP/1.1 500 Internal Server Error');
            exit('Parent "checkins" page not found');
        }

        // -----------------------------
        // Create child page
        // -----------------------------
        try {
            $page = $parent->createChild([
                'template' => 'checkin-micropub', // Micropub-safe template
                'content'  => [
                    'title'         => $title,
                    'text'          => $text,
                    'date'          => $published,
                    'location_data' => json_encode($props['checkin'][0] ?? []),
                    'address_data'  => json_encode($props['location'][0] ?? []),
                ]
                // ⚠️ Do NOT set 'slug' — Kirby generates it automatically
            ]);
        } catch (\Exception $e) {
            header('HTTP/1.1 500 Internal Server Error');
            exit('Error creating page: ' . $e->getMessage());
        }

        // -----------------------------
        // Success response
        // -----------------------------
        header('HTTP/1.1 201 Created');
        header('Location: ' . $page->url());
        echo json_encode([
            'status' => 'created',
            'url'    => $page->url()
        ]);
        exit;
    }

    public static function endpoint()
    {
        return static::handle();
    }
}
