<?php snippet('header') ?>

<main id="content" class="page page__center">
  <div class="note-text note-book"> 
  <?php if ( $page->feature_images()->isNotEmpty() ) : ?>
    <picture class="note-picture">
        <?php $images = $page->feature_images()->toFiles(); foreach($images as $image): ?>
        <img loading="lazy" class="u-photo" src="<?= $image->resize(250,400)->url() ?>" alt="<?= $image->alt() ?>" width="250" height="400">
        <?php endforeach; ?>
    </picture>
    <?php endif ?>
    <div class="note-book__meta">
      
      <?php if ( $page->review()->isNotEmpty()) : ?>
      <article class="text-medium"><?= $page->review() ?></article>
      <?php endif ?>

      <div class="note-footnote text-default">

        <?php if ( $page->finished()->isNotEmpty() ) : ?>
          <div class="meta"><strong>Finished reading:</strong> <time
            datetime="<?= $page->finished()->toDate('Y-m-d\TH:i:s') ?>"
            class="dt-published"><?= $page->finished()->toDate('jS F Y') ?></time
          ></div>
          <?php else : ?>
          <div class="meta"><strong>Started reading:</strong> <time
          datetime="<?= $page->date()->toDate('Y-m-d\TH:i:s') ?>"
          class="dt-published"><?= $page->date()->toDate('jS F Y') ?></time
        ></div>
        <?php endif; ?>

        <div class="meta"><strong>ISBN:</strong> <?= $page->isbn() ?></div>  
        <div class="author"><strong>Author:</strong>  <?= $page->book_author() ?></div>
      </div>

    </div>
  </div>
  <div class="note-footer text-small note-structure">
    <a class="link" href="<?= $site->url() ?>/bookshelf">&laquo; View all reads</a>
  </div>
</main>

<?php snippet('footer') ?>
