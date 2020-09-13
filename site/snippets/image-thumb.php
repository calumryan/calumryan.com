<div class="note-image p-image">
    <picture>
    <?php if ( $post->feature_image()->isNotEmpty() ) : ?>
        <img loading="lazy" class="u-photo" src="<?= $site->url() ?>/media/pages/posts/uploads/_thumb/<?= $post->feature_image()->crop(400,200) ?>" alt="<?= $post->image_alt() ?>" width="300" height="300">
    <?php else : ?>
        <?php $images = $post->feature_images()->toFiles(); foreach($images as $image): ?>
        <img loading="lazy" class="u-photo" src="<?= $image->crop(400,200)->url() ?>" alt="<?= $image->alt() ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    </picture>
</div>