<?php
/**
 * Templates render the content of your pages. 
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page. 
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`. 
 * This home template renders content from others pages, the children of the `photography` page to display a nice gallery grid.
 * Snippets like the header and footer contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php snippet('header') ?>

<main id="content">

  <div class="page">

    <div>
      <h2>Recently</h2>
      <?php 
      $collection = pages(['notes']);
      if ($collection): ?>
      <ul class="notes h-feed">
        <?php foreach ($collection->children()->listed()->sortBy('date', 'desc')->paginate(4) as $post): ?>
          <?php $content_type = $post->parent(); ?>
          <li class="h-entry<?= ' h-entry__'.$content_type ?>">
            <?php 
              $content_type = $post->parent();
              $snippet_path = 'content-'.$content_type; 
              snippet($snippet_path,['post' => $post]);
            ?>
          </li>
          <?php endforeach ?>
      </ul>
      <?php endif ?>
    </div>

    <?php snippet('webrings') ?>

  </div>

</main>

<?php snippet('footer') ?>
