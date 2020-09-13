<article class="note">
  <header class="note-header">
    <div>
        <svg class="icon" aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-calendar"></use></svg>
    </div>
    <div>
      <h2 class="heading-small"><a class="p-name name" href="<?= $post->url() ?>"><?= $post->title() ?></a></h2>
    </div>
  </header>
  <?php snippet('content-footer',['post' => $post]) ?>
</article>