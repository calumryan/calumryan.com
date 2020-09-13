<?php if ( $page->speaker()->isNotEmpty() ) : ?>
<svg class="icon" role="img" width="20" height="20"><title>Speaker/volunteer at <?= $page->title() ?></title><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-speaker"></use></svg>
<?php endif ?>
<?php if ( $page->downloadSlides()->isNotEmpty() ) : ?>
<a class="link" href="<?= $page->downloadSlides() ?>" download><svg class="icon"  aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-presentation"></use></svg></a>
<?php endif ?>
<?php if ( $page->view_slides()->isNotEmpty() ) : ?>
<a class="link" href="<?= $page->view_slides() ?>" aria-label="View slides for <?= $page->title() ?>"><svg class="icon" aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-presentation"></use></svg></a>
<?php endif ?>