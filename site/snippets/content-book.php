<article class="note">
  <div class="note-header">
    <?php if ( $post->feature_images()->isNotEmpty() ) : ?>
    <picture class="note-picture">
        <?php $images = $post->feature_images()->toFiles(); foreach($images as $image): ?>
        <img loading="lazy" class="u-photo" src="<?= $image->resize(150,230)->url() ?>" alt="<?= $image->alt() ?>" width="150" height="230">
        <?php endforeach; ?>
    </picture>
    <?php endif ?>

    <div class="note-header__side">

      <h2 class="heading-small"><a class="p-name name" href="<?= $post->url() ?>"
          ><?= $post->title() ?></a></h2>
      <div class="author"><?= $post->book_author() ?></div>
      <?php if ( $post->finished()->isNotEmpty() ) : ?>
      <div class="meta">Finished <time
        datetime="<?= $post->finished()->toDate('Y-m-d\TH:i:s') ?>"
        class="dt-published"><?= $post->finished()->toDate('jS F Y') ?></time
      ></div>
      <?php else : ?>
      <div class="meta">Started reading <time
      datetime="<?= $post->date()->toDate('Y-m-d\TH:i:s') ?>"
      class="dt-published"><?= $post->date()->toDate('jS F Y') ?></time
    ></div>
      <?php endif; ?>

    </div>

  </div>
</article>