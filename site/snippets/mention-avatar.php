<?php if ( $item->data->author->photo ) : ?><img class="webmention__author__photo u-photo" src="<?= $item->data->author->photo; ?>"
    alt="<?= $name; ?>" title="<?= $name; ?>" loading="lazy" width="60" height="60">
<?php else : ?>
    <div class="webmention__avatar">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="30" height="30"><title>Empty avatar for <?= $name; ?></title><path fill="#4a1034" d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0 96 57.31 96 128s57.3 128 128 128zm50.7 48H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3c0-95.7-77.6-173.3-173.3-173.3z"/></svg>
    </div>
<?php endif; ?>