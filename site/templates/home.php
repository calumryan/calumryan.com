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

<div class="book__main book__main__home">
  
  <main id="content" class="page ">

    <div class="page">

      <?php if ( $articles = page('articles')->children()->sortBy('date', 'desc')->limit(1) ) : ?>
      <article class="band">
        <div class="band-content bg-articles">

        <?php foreach ($articles as $article): ?>
          <?php if ( $image = $article->og_thumbnail()->toFile() ) : ?>
          <img src="<?= $image->resize(150,150,100)->url() ?>" alt="<?= $image->alt(); ?>" loading="lazy" width="150" height="150">
          <?php elseif ( $article->thumbnail()->isNotEmpty() ) : ?>
          <img src="<?= $article->thumbnail() ?>" alt="<?= $article->thumbnail()->alt(); ?>" loading="lazy" width="150" height="150">
          <?php else: ?>
          <svg class="icon" aria-hidden="true" width="80" height="80"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-post"></use></svg>
          <?php endif ?>
          
          <header>
            
            <h2 class="heading-medium"><a class="p-name name link" href="<?= $article->url() ?>"><?= $article->title() ?></a></h2>
            <?php if ( $article->description()->isNotEmpty() ) : ?><p class="p-summary text"><?= $article->description(); ?></p><?php endif; ?>
            <p class="text"><time class="note-date"><?= $article->date()->toDate('j F Y') ?></time></p>
            
          </header>
          <?php endforeach ?>
        </div>
      </article>
      <?php endif ?>

      <?php if ( $page->banner()->isNotEmpty() ) : ?>
      <figure class="banner">
        <?php $image = $page->banner()->toFile(); ?>
        <img class="u-featured" src="<?= $image->resize(1200)->url() ?>" alt="" width="1200" height="400">
        <figcaption class="banner__caption"><?= $image->alt() ?></figcaption>
      </figure>
      <?php endif ?>

      <div>
        <?php snippet('aside-more') ?>
      </div>

      <br>

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
