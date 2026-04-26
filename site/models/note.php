<?php

use Kirby\Cms\Page;

class NotePage extends Page
{
    public function createNote(array $props): Page
    {
        $notesPage = page('notes');
        $children  = $notesPage?->children() ?? null;

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

        // Force template
        $props['template'] = 'note';

        // DO NOT set slug — let Kirby generate it
        unset($props['slug']);

        // Set content fields
        $props['content']['title'] = date('F jS, Y');
        $props['content']['uid']   = $newUid;

        // Use the *site* createChild(), not parent::create()
        return page('notes')->createChild($props);
    }
}
