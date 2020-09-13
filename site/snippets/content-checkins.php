<article class="note note-short">
  <header class="note-header">
    <div>
        <svg class="icon" aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-location"></use></svg>
    </div>
    <h2 class="sr-only p-name"><?= $post->date()->toDate('d F Y h:m T') ?></h2>
    <div class="e-content"><?= $post->text()->kt() ?></div>
  </header>
  <?php snippet('content-picture',['post' => $post]) ?>
  <?php snippet('content-footer',['post' => $post]) ?>
</article>