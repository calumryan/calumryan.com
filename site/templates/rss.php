<?php snippet('header') ?>

<div class="book__main"><main id="content" class="page ">

    <article class="text note-structure h-entry text-medium">
      <?= $page->text()->kt() ?>

      <?php if ($rss_feeds = page('rss')): ?>
      <ul>
        <?php foreach ($rss_feeds->links()->toStructure() as $item): ?>
        <li><a  class="link" href="<?= $item->url() ?>"><?php if ( $item->icon()->isNotEmpty() ): ?><?php endif; ?><?= $item->title() ?></a></li>
        <?php endforeach ?>
      </ul>
      <?php endif ?>

    </article>

</main>

<?php snippet('footer') ?>
