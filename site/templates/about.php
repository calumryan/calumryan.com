<?php snippet('header') ?>

<main id="content" class="page">

    <article class="text note-structure h-entry">
      <?= $page->text()->kt() ?>
      <?php snippet('aside-more') ?>
      <?php snippet('post-meta',['post' => $page]) ?>
    </article>

</main>

<?php snippet('footer') ?>
