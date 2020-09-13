<?php if ( $post->feature_image() != '' ) : ?>
<div class="note-image p-image">
  <picture>
    <source media="all and (min-width: 46em)" srcset="<?= $site->url() ?>/media/pages/posts/uploads/<?= $post->feature_image() ?>">
    <img loading="lazy" class="u-photo" src="<?= $site->url() ?>/media/pages/posts/uploads/_small/<?= $post->feature_image() ?>" srcset="
    <?= $site->url() ?>/media/pages/posts/uploads/<?= $post->feature_image() ?> 2.5x" alt="<?= str_replace('Checked in at', 'View of', $post->text())?>" width="300" height="300">
  </picture>
</div>
<?php endif ?>