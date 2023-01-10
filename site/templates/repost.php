<?php snippet('header') ?>

<main id="content" class="page page__center h-entry">
  <div class="note-text text note-structure text-medium"> 
  <?php snippet('repost',['post' => $page]) ?>
  <a class="u-url external-link link text-medium" href="<?= $page->blink() ?>">Go to this repost</a>
  <?php if ( $page->bridgy()->isNotEmpty() ) : ?><a class="u-bridgy-omit-link" href="https://brid.gy/publish/twitter" hidden></a><?php endif ?>
  <?php snippet('link-archive',['post' => $page]) ?>
  </div>
</main>

<?php snippet('footer') ?>
