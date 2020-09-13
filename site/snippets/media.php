<?php if ( $post->feature_image()->isNotEmpty() || $post->feature_images()->isNotEmpty() && $post->feature_images()->toFiles()->count() == 1 ) : ?>
<?php snippet('image', ['post' => $post]) ?>
<?php elseif ( $post->feature_images()->isNotEmpty() && $post->feature_images()->toFiles()->count() > 1 ) : ?>
<?php snippet('images', ['post' => $post]) ?>
<?php endif ?>