<?php snippet('header') ?>

<div class="book__main"><main id="content" class="page  page__center">

    <div class="note-text note-structure text-card h-entry">
      <?= $page->text()->kt() ?>
      <p class="p-locality icon-inline heading-medium"><?php snippet('location', ['page' => $page]) ?><?= $page->city() ?></p>
      <p class="p-location h-card content-body highlight"><strong>Location:</strong> <?= $page->location() ?> </p>
      <?php snippet('speaker', ['page' => $page]) ?>  
      <?php if ( $page->download_slides()->isNotEmpty() ) : ?>
      <section class="section-break">
        <div class="icon-inline"><svg class="icon" aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-presentation"></use></svg><a class="link" href="<?= $page->download_slides() ?>" download>Download slides</a></div>
      </section>  
      <?php endif ?>
      <?php if ( $page->view_slides()->isNotEmpty() ) : ?>
      <section class="section-break">
        <div class="icon-inline"><svg class="icon" aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-presentation"></use></svg><a target="_blank" rel="noopener noreferrer" class="link" href="<?= $page->view_slides() ?>">View slides</a></div>
      </section>  
      <?php endif ?>
      <?php if ( $page->view_video()->isNotEmpty() ) : ?>
      <section class="section-break">
        <div class="icon-inline"><svg class="icon" aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-video"></use></svg><a target="_blank" rel="noopener noreferrer" class="link" href="<?= $page->view_video() ?>">View video</a></div>
      </section>  
      <?php endif ?>
      <?php snippet('mentions', ['page' => $page]) ?>
      <?php snippet('link-archive',['post' => $page]) ?>
      <?php snippet('post-meta',['post' => $page]) ?>
    </div>

</main>

<?php snippet('footer') ?>
