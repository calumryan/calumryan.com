<?php snippet('header') ?>

<main id="content" class="page page__center h-entry">
  <div class="note-text text note-structure text-medium"> 
  <?php snippet('repost',['post' => $page]) ?>
  <a class="u-url external-link link text-medium" href="<?= $page->permalink() ?>">Go to this repost</a>
  <?php snippet('link-archive',['post' => $page]) ?>
  </div>
</main>

<?php snippet('footer') ?>
