<article class="note bg-articles">
  <?php
  $thumbnailType = strtolower(trim($post->thumbnail_type()->value()));
  $showThumbHeader = $thumbnailType !== 'svg';
  ?>
  <header class="note-header<?= $showThumbHeader ? ' note-header-thumbnail' : '' ?>">
    <svg class="icon" aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= url('assets/icons/icons.sprite.svg') ?>#icon-post"></use></svg>
    <div>
      <h2 class="heading-small"><a class="p-name name" href="<?= $post->url() ?>"
        ><?= $post->title() ?></a></h2>
      <?php if ( $post->description()->isNotEmpty() ) : ?><p class="p-summary"><?= $post->description(); ?></p><?php endif; ?>
    </div>
    
    <?php if ($thumbnailType === 'svg' ) : ?>
    <?php elseif ( $image = $post->og_thumbnail()->toFile() ) : ?>
    <img src="<?= $image->resize(150,150,100)->url() ?>" alt="<?= $image->alt(); ?>" loading="lazy">
    <?php elseif ( $post->thumbnail()->isNotEmpty() ) : ?>
    <img src="<?= $post->thumbnail() ?>" alt="<?= $post->thumbnail_text() ?>" loading="lazy">
    <?php endif ?>
  </header>
  <?php snippet('content-footer',['post' => $post]) ?>
</article>