<?php $characters = array('https://','http://','www.'); ?>
<article class="note">
  <header class="note-header">
    <h2 class="sr-only"><?= $post->date()->toDate('d F Y') ?></h2>
    <svg class="icon" aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-like"></use></svg>
    <div>
      <span class="sr-only">Like of </span><?php snippet('like',['post' => $post]) ?>
    </div>
  </header>
  <?php snippet('content-footer',['post' => $post]) ?>
</article>