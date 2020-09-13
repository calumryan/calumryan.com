<div class="note-image p-image">
    <picture>
    <?php if ( $post->feature_image()->isNotEmpty() ) : ?>
        <img loading="lazy" class="u-photo" src="<?= $site->url() ?>/media/pages/posts/uploads/<?= $post->feature_image() ?>" alt="<?= $post->image_alt() ?>" width="300" height="300">
    <?php else : ?>
        <?php $images = $post->feature_images()->toFiles(); foreach($images as $image): ?>
        <img loading="lazy" class="u-photo" src="<?= $image->resize(1000)->url() ?>" alt="<?= $image->alt() ?>" width="300" height="300">
        <?php endforeach; ?>
    <?php endif; ?>
    </picture>
</div>