<?php snippet('header') ?>

<main id="content" class="page page__center">
  <div class="note-text text note-structure text-medium h-entry"> 
  <?php snippet('rsvp',['post' => $page]) ?>
  <?php snippet('link-archive',['post' => $page]) ?>
  <?php snippet('post-meta',['post' => $page]) ?>
  </div>
  
</main>

<?php snippet('footer') ?>
