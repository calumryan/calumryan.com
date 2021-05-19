<?php if ( $post->feature_images()->isNotEmpty() ) : ?>
<div class="note-image gallery">
  <?php
  $images =  $post->feature_images()->toFiles();
  foreach($images as $image): 
  ?>
  <a href="<?= $image->url() ?>">
    <img loading="lazy" class="u-photo" src="<?= $image->resize(800)->url() ?>" alt="<?= $image->alt() ?>" width="300" height="300">
  </a>
  <?php endforeach ?>
</div>
<?php endif ?>