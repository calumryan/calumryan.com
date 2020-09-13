<article class="note note-short">
  <header class="note-header">
    <div>
        <svg class="icon" aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-note"></use></svg>
    </div>
    <h2 class="sr-only"><?= $post->date()->toDate('d F Y h:m T') ?></h2>
    <div class="e-content p-name"><?= $post->text()->kt() ?></div>
  </header>
  <?php snippet('image-thumb', ['post' => $post]) ?>
  <?php snippet('content-footer',['post' => $post]) ?>
</article>