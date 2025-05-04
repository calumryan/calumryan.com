<?php snippet('header') ?>

<div class="book__main"><main id="content" class="page  page__center">
  <div class="note-text text note-structure text-medium h-entry"> 
    <div class="note-link">
      <svg aria-hidden="true" class="icon" role="img" width="50" height="50"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-like"></use></svg><span class="sr-only">Like of </span><?php snippet('like',['post' => $page]) ?>
    </div>
    <?php snippet('link-archive',['post' => $page]) ?>
    <?php snippet('post-meta',['post' => $page]) ?>
  </div>
</main>

<?php snippet('footer') ?>
