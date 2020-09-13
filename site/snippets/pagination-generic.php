<?php if ($notes->pagination()->hasPages()): ?>
<nav aria-label="Pagination" class="pagination">
    <?php $content_type = $notes->parent(); ?>

    <?php if ($notes->pagination()->hasNextPage()): ?>
    <a class="next link" href="<?= $notes->pagination()->nextPageURL() ?>"><svg aria-hidden="true" class="icon" role="img" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-chevron-left"></use></svg> Older results</a>
    <?php endif ?>

    <?php if ($notes->pagination()->hasPrevPage()): ?>
    <a class="prev link" href="<?= $notes->pagination()->prevPageURL() ?>">Newer results <svg aria-hidden="true" class="icon" role="img" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-chevron-right"></use></svg></a>
    <?php endif ?>
</nav>
<?php endif ?>