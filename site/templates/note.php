<?php snippet('header') ?>

<main id="content" class="page page__center">

    <article class="note note-structure note-text note-short h-entry">
        <h1 hidden><?= $page->title() ?></h1>
        <div class="note-content e-content p-name">
        <?= $page->text()->kt() ?><span hidden> <?= $page->url() ?></span>
        </div>
        <?php snippet('content-hcard') ?>
        <?php snippet('media', ['post' => $page]) ?>
        <?php snippet('mentions', ['page' => $page]) ?>
        <?php snippet('link-archive',['post' => $page]) ?>
        <?php snippet('post-meta',['post' => $page]) ?>
        <?php if ( $page->mastodon()->isNotEmpty() ) : ?><a class="u-bridgy-omit-link" href="https://brid.gy/publish/mastodon" hidden></a><?php endif ?>
        <?php if ( $page->mastodon_fed()->isNotEmpty() ) : ?><a class="u-bridgy-fed" href="https://fed.brid.gy/" hidden></a><?php endif ?>
    </article>
</main>

<?php snippet('footer') ?>