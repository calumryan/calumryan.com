<article class="note">
  <header class="note-header">
    <h2 class="sr-only"><?= $post->date()->toDate('d F Y') ?></h2>
    <svg class="icon icon-side"  aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-bookmark"></use></svg>
    <div>
      <span class="sr-only">Bookmark of </span><a class="u-bookmark-of p-name link" href="<?= $post->permalink() ?>"
        ><?= $post->title() ?></a>
    </div>
  </header>
  <?php snippet('content-footer',['post' => $post]) ?>
</article>