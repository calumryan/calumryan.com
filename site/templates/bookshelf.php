<?php snippet('header') ?>

<div class="book__main"><main id="content" class="page ">

  <div>

    <section>
    <?php foreach ($notes = $page->children()->listed()->sortBy('date', 'desc')->paginate(1) as $note): ?>

    <?php if ( $note->feature_images()->isNotEmpty() ) : ?>
    <picture class="shelf">
        <?php $images = $note->feature_images()->toFiles(); foreach($images as $image): ?>
        <img loading="lazy" class="u-photo" src="<?= $image->resize(200,300)->url() ?>" alt="<?= $image->alt() ?> on a bookshelf" width="200" height="300">
        <?php endforeach; ?>
    </picture>
    <?php endif ?>

    <?php endforeach ?>
    </section>

    <div class="notes">
    <?php foreach ($notes = $page->children()->listed()->sortBy('date', 'desc')->paginate(20) as $note): ?>
    <?php 
          $content_type = $note->parent();
          $snippet_path = 'content-book'; 
          snippet($snippet_path,['post' => $note]);
    ?>
    <?php endforeach ?>
    </div>
  <div>
    
  <?php snippet('pagination-book',['notes' => $notes]); ?>

</main>

<?php snippet('footer') ?>
