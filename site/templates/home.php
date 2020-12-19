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

    <div class="band-artwork">
      <svg viewBox="0 0 567 115" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><title>artwork of the Severn Sisters chalk cliffs.</title><path d="M424.744 106.277s-29.194-90.11-74.11-92.101c-62.262-2.76-94.371 99.822-192.053 100.312l266.163-8.21z" fill="#005c04"/><path d="M427.807 114.488H166.936s57.209-5.804 99.207-32.268c14.943-9.416 37.364-37.166 40.56-37.454.664-.06 1.31-.124 1.937-.194 29.074-3.212 19.464-16.477 25.162-18.319 9.467 1.883 30.346-15.506 56.803 11.3 26.456 26.807 37.202 76.935 37.202 76.935z" fill="#fff"/><path d="M334.792 114.263l-.958-88.036s-2.592.25-3.057 5.517c-.18 2.041-1.99 3.458-5.273 4.877a5623.737 5623.737 0 01-19.21 8.212l13.703 69.43h14.795z" fill="#e2e2e2"/><path d="M0 114.488S110.96 0 200.78 0c89.818 0 135.94 113.929 276.65 114.488H0z" fill="#217f00"/><path d="M26.051 114.488S120.201 6.656 196.412 6.656c76.211 0 115.346 107.305 234.738 107.832H26.051z" fill="#005c04"/><path d="M102.088 114.488h318.85s-69.923-6.24-121.255-34.687c-18.264-10.122-45.67-39.952-49.575-40.262-.812-.064-1.6-.133-2.367-.208-35.536-3.453-23.791-17.712-30.755-19.692-11.571 2.024-37.09-16.67-69.427 12.147-32.336 28.816-45.47 82.702-45.47 82.702z" fill="#fff"/><path d="M215.775 114.246l1.171-94.636s3.168.27 3.736 5.931c.22 2.194 2.433 3.717 6.446 5.243 7.225 2.745 23.478 8.827 23.478 8.827l-16.747 74.635h-18.084z" fill="#e2e2e2"/><path d="M566.544 114.488h-56.942l-32.17.307-24.395-.307-333.57.307s27.468-2.093 52.521-3.95c22.61-1.676 41.508-9.943 56.612-9.859 23.732.133 142.88 6.906 202.55 6.036 31.692-.461 62.433.568 76.687.807 43.664.733 58.707 6.659 58.707 6.659z" fill="#0052a6"/><g><path d="M404.264 104.91c25.226 1.356 44.185 6.253 24.388 5.086-15.027-.885-34.951-4.657-63.496.129-15.873 2.654-129.356-12.895-151.135-7.502-24.45 6.066-33.343 10.916-111.96 11.973 0 0 100.567-17.491 125.424-17.13 11.46.16 84.427 6.71 130.137 7.982 22.571.629 40.51-.859 46.642-.539z" fill="#ffeaa0"/></g></svg>
    </div>

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
