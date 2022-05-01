<?php snippet('header') ?>

<main id="content" class="page">
    <?php 
    $group = page(['notes','checkins']);
    $collection = $group->children()->listed()->sortBy('date', 'uid', 'desc')->flip()->files()->filterBy('type', 'image')->paginate(10);
    if ($collection): ?>
    <div>
        <ul class="notes gallery">
        <?php foreach ($collection as $image): ?> 
            <li><a href="<?= $image->url() ?>" class="note-image p-image">
                <img loading="lazy" class="u-photo" src="<?= $image->crop(400,200)->url() ?>" alt="<?= $image->alt() ?>">
            </a></li>
        <?php endforeach ?>
        </ul>
    </div>
    <?php snippet('pagination-images',['notes' => $collection]); ?>
    <?php endif ?>
</main>

<?php snippet('footer') ?>
