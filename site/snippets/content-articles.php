<article class="note bg-articles">
  <header class="note-header<?php if ( $post->thumbnail()->isNotEmpty() ) : echo ' note-header-thumbnail'; endif; ?>">
    <svg class="icon" aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-post"></use></svg>
    <div>
      <h2 class="heading-small"><a class="p-name name" href="<?= $post->url() ?>"
        ><?= $post->title() ?></a></h2>
    </div>
    <?php if ( $post->thumbnail()->isNotEmpty() ) : ?>
    <img src="<?= $post->thumbnail() ?>" alt="" aria-hidden="true" loading="lazy">
    <?php endif ?>
  </header>
  <footer class="post-meta">
  <a href="<?= $post->url() ?>" class="u-url">
    <time
      datetime="<?= $post->date()->toDate('Y-m-d\TH:i:s') ?>"
      class="dt-published"
      ><?= $post->date()->toDate('j F Y') ?></time
    ></a>
  </footer>
</article>