<div class="note-reply">
    <svg class="icon icon-side" aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-reply"></use></svg>
    <span class="p-name e-content"><?= $post->text() ?></span>
</div>
<div class="note-footnote text-small">In reply to <a href="<?= $post->blink() ?>" class="u-in-reply-to in-reply-to link link-long" rel="in-reply-to"><?= $post->blink() ?></a></div>