<?php
// Capture webmentions from webmention.io
$mentions = '';
$webmentionIO = 'https://webmention.io/api/mentions?target=';

$url1 = $webmentionIO.$page->url();

try {

    $url1 = $webmentionIO.$page->url();
    $content1 = @file_get_contents($url1, false);

    // Check if redirect then merge output of two captures
    if ( $page->redirect()->isNotEmpty() ) :
        $url2 = $webmentionIO.$page->redirect();
        $content2 = @file_get_contents($url2, false);
        $contentMerge = json_encode(array_merge(json_decode($content1,true),json_decode($content2,true)));
    else:
        $contentMerge = $content1; 
    endif;

    if ($contentMerge === false) {
        // Handle the error
        echo 'Webmentions currently unavailable';
    } else {

    $mentions = json_decode($contentMerge);

    if ( $mentions->links ) : ?>

    <div class="webmentions section-break">

        <div class="webmentions__header">

            <h2 id="webmentions">Webmentions</h2>

            <a href="https://indieweb.org/Webmention" class="webmentions__info link" target="_blank" rel="noopener noreferrer"><svg class="icon icon--question" role="img" aria-hidden="true" width="24" height="24"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-question"></use></svg>What’s this?</a>

        </div>

        <?php

        $likes = array_filter($mentions->links, function($item) {
        return $item->activity->type == 'like';
        });

        $replies = array_filter($mentions->links, function($item) {
        return $item->activity->type == 'reply';
        });

        $reposts = array_filter($mentions->links, function($item) {
        return $item->activity->type == 'repost';
        });

        $bookmarks = array_filter($mentions->links, function($item) {
        return $item->activity->type == 'bookmark';
        });

        $rsvps = array_filter($mentions->links, function($item) {
        return $item->activity->type == 'rsvp';
        });

        $links = array_filter($mentions->links, function($item) {
        return $item->activity->type == 'link';
        });

        if ( $likes ) : snippet('mention-likes', ['likes' => $likes]); endif;
        if ( $reposts ) : snippet('mention-reposts', ['reposts' => $reposts]); endif;
        if ( $replies ) : snippet('mention-replies', ['replies' => $replies]); endif;
        if ( $bookmarks ) : snippet('mention-bookmark', ['bookmarks' => $bookmarks]); endif;
        if ( $rsvps ) : snippet('mention-rsvps', ['rsvps' => $rsvps]); endif;
        if ( $links ) : snippet('mention-links', ['links' => $links]); endif;
        ?>
    </div>

    <?php endif;

    }

} catch (Exception $e) {
    // Handle exception
} 