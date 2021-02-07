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

    <?php if ( $articles = page('articles')->children()->sortBy('date', 'desc')->limit(1) ) : ?>
    <article class="band">
      <div class="band-content bg-articles">
        <svg class="icon" aria-hidden="true" width="80" height="80"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-post"></use></svg>
        <header>
          <?php foreach ($articles as $article): ?>
          <h2 class="heading-medium"><a class="p-name name link" href="<?= $article->url() ?>"><?= $article->title() ?></a></h2>
          <?php if ( $article->description()->isNotEmpty() ) : ?><p class="p-summary"><?= $article->description(); ?></p><?php endif; ?>
          <?php endforeach ?>
        </header>
      </div>
    </article>
    <?php endif ?>

    <div>
      <h2>My recent notes, bookmarks and other posts</h2>
      <?php 
      $collection = pages(['notes', 'rsvps', 'bookmarks', 'replies', 'events', 'checkins', 'reposts', 'likes']);
      if ($collection): ?>
      <ul class="notes h-feed">
        <?php foreach ($collection->children()->listed()->sortBy('date', 'desc')->paginate(6) as $post): ?>
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
      <?php snippet('aside-more') ?>
    </div>

  </div>
  
</main>

<?php snippet('footer') ?>
