<?php snippet('header') ?>

<main id="content" class="page">
    <div class="text text-article note-structure note-summary">
    <?= $page->text()->kt(); ?>
    </div>
    <?php 
    
    $collection = pages('events')->children()->filterBy('tags', 'speaker', ',')->flip()->paginate(10);
    if ($collection): ?>
    <div>
      <div class="notes">
      <?php foreach ($collection->listed()->sortBy('date', 'desc')->paginate(8) as $post): ?>
        <?php $content_type = $post->parent(); ?>
        <div class="h-entry<?= ' h-entry__'.$content_type ?>">
          <?php 
            $content_type = $post->parent();
            $snippet_path = 'content-'.$content_type; 
            snippet($snippet_path,['post' => $post]);
          ?>
        </div>
        <?php endforeach ?>
        </div>
    </div>
    <?php endif ?>
</main>

<?php snippet('footer') ?>
