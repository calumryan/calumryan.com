<?php if ( $page->Weather_Icon() != '' ) : ?>
<svg class="icon icon--weather p-weather" role="img" width="20" height="20"><title><?= str_replace('-',' ',$page->Weather_Icon()) ?></title><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-<?= $page->Weather_Icon() ?>"></use></svg>
<?php endif ?>
<?php if ( $page->Temperature() != '' ) : ?>
<span class="p-temperature"><?= $page->Temperature() ?></span>
<?php endif ?>