<?php snippet('header') ?>

<div class="book__main"><main id="content" class="page  page__center">

    <article class="note note-structure note-text note-short h-entry">
        <h1 class="p-name" hidden><?= $page->title() ?></h1>
        <div class="note-content e-content">
        <?= $page->text()->kt(); ?>
        </div>
        <?php if ( $page->location_data()->isNotEmpty() ): ?>
        <?php snippet('image',['post' => $page]) ?>
        <?php else: ?>
        <?php snippet('content-picture',['post' => $page]) ?>
        <?php endif ?>
        <?php snippet('mentions', ['page' => $page]) ?>
        <?php snippet('link-archive',['post' => $page]) ?>
        <?php snippet('post-meta',['post' => $page]) ?>
    </article>
</main>

<?php snippet('footer') ?>