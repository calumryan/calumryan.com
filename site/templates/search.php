<?php snippet('header') ?>
<main id="content" class="page page__center page__column page__short">

  <div>
    <?php $limit = 20; ?>
    <?php snippet('form-search') ?>
    <?php if ( $results->listed()->count() ) : ?>
    <ol class="notes h-feed">
      <?php foreach ($notes = $results->listed()->sortBy('date', 'desc')->paginate($limit) as $post): ?>
      <?php $content_type = $post->parent(); ?>
      <li class="h-entry<?= ' h-entry__'.$content_type ?>">
        <?php 
          $content_type = $post->parent();
          $snippet_path = 'content-'.$content_type; 
          snippet($snippet_path,['post' => $post]);
        ?>
      </li>
      <?php endforeach ?>
    </ol>
    <?php elseif( html($query) ) : ?>
    <div class="text note note-structure text-medium">
    <?= $page->text() ?>
    </div>
    <?php endif ?>

  </div>
  <?php if ( $results->listed()->count() > $limit ) : ?>
  <?php snippet('pagination-generic',['notes' => $notes]); ?>
  <?php endif ?>


</main>
<?php snippet('footer') ?>