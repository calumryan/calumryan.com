<?php snippet('header') ?>

<main id="content" class="page page__center">

    <article class="note note-structure note-text note-short h-entry">
        <h1 class="p-name" hidden><?= $page->title() ?></h1>
        <div class="note-content e-content">
        <?= $page->text()->kt() ?>
        </div>
        <?php snippet('content-picture',['post' => $page]) ?>
        <?php snippet('mentions', ['page' => $page]) ?>
        <?php snippet('link-archive',['post' => $page]) ?>
        <?php snippet('post-meta',['post' => $page]) ?>
    </article>
</main>

<?php snippet('footer') ?>