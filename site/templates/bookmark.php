<?php snippet('header') ?>

<main id="content" class="page page__center">

    <div class="note-text text note-structure h-entry">
      <div class="note-link">
        <svg aria-hidden="true" class="icon" role="img" width="50" height="50"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-bookmark"></use></svg>
        <div>
        <a class="p-name u-bookmark-of" href="<?= $page->permalink() ?>"><?= $page->title() ?></a>
        <a href="<?= $page->permalink() ?>" hidden><?= $page->permalink() ?></a>
        </div>
      </div>
      <?php snippet('link-archive',['post' => $page]) ?>
      <?php snippet('post-meta',['post' => $page]) ?>
      <?php if ( $page->bridgy()->isNotEmpty() ) : ?><a class="u-bridgy-omit-link" href="https://brid.gy/publish/twitter" hidden></a><?php endif ?>
    </div>  

</main>

<?php snippet('footer') ?>
