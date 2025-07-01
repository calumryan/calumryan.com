<?php

use Kirby\Cms\Page;

class ReplyPage extends Page
{
    /**
     * Creates and stores a new replies page with incremented numeric UID
     *
     * @param array $props
     * @return self
     */
    public static function create(array $props): self
    {
        $repliesPage = page('replies');
        $children = $repliesPage ? $repliesPage->children() : null;

        $maxUid = 0;

        if ($children && $children->count() > 0) {
            foreach ($children as $child) {
                // Get uid from content, cast to int, fallback 0
                $uid = (int) $child->content()->get('uid')->value();
                if ($uid > $maxUid) {
                    $maxUid = $uid;
                }
            }
        }

        $newUid = $maxUid + 1;

        $props['slug'] = '_' . $newUid;
        $props['content']['title'] = date('F jS, Y');
        $props['content']['uid'] = $newUid;

        return parent::create($props);
    }
}
