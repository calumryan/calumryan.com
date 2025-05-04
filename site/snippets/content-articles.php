<article class="note bg-articles">
  <header class="note-header<?php if ( $post->og_thumbnail()->isNotEmpty() || $post->thumbnail()->isNotEmpty() ) : echo ' note-header-thumbnail'; endif; ?>">
    <svg class="icon" aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-post"></use></svg>
    <div>
      <h2 class="heading-small"><a class="p-name name" href="<?= $post->url() ?>"
        ><?= $post->title() ?></a></h2>
      <?php if ( $post->description()->isNotEmpty() ) : ?><p class="p-summary"><?= $post->description(); ?></p><?php endif; ?>
    </div>
    <?php if ( $image = $post->og_thumbnail()->toFile() ) : ?>
    <img src="<?= $image->resize(150,150,100)->url() ?>" alt="<?= $post->og_thumbnail_description(); ?>" loading="lazy">
    <?php elseif ( $post->thumbnail()->isNotEmpty() ) : ?>
    <img src="<?= $post->thumbnail() ?>" alt="<?= $post->og_thumbnail_description(); ?>" loading="lazy">
    <?php endif ?>
  </header>
  <?php snippet('content-footer',['post' => $post]) ?>
</article>