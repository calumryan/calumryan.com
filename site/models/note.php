<?php

use Kirby\Cms\Page;

class NotePage extends Page
{
    public static function create(array $props): self
    {
        $notesPage = page('notes');
        $children = $notesPage ? $notesPage->children() : null;

        $maxUid = 0;

        if ($children && $children->count() > 0) {
            foreach ($children as $child) {
                $uid = (int) $child->content()->get('uid')->value();
                if ($uid > $maxUid) {
                    $maxUid = $uid;
                }
            }
        }

        $newUid = $maxUid + 1;

        // ⭐ Force correct template
        $props['template'] = 'note';

        // Your existing logic
        $props['slug'] = (string) $newUid;
        $props['content']['title'] = date('F jS, Y');
        $props['content']['uid'] = $newUid;

        return parent::create($props);
    }
}
