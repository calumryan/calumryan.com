
<?php snippet('header') ?>

<main id="content" class="page">

  <article class="note h-entry">

    <div class="text text-article note-structure e-content">
      <h1 class="p-name" hidden><?= $page->title() ?></h1>
      <?php if ( $page->description()->isNotEmpty() ) : ?><p class="p-summary"><strong><?= $page->description(); ?></strong></p><?php endif; ?>
      <?= $page->text()->kt() ?>
    </div>
    

    <div class="note-structure note-after">

      <section>
        <?php
          $location = $page->locator()->yaml();

          if(!empty($location['lat'])) {
              echo $location['lat'];
          }
          else {

          }
        ?>
        </section>

        <?php snippet('mentions', ['page' => $page]) ?>
        <?php snippet('link-archive',['post' => $page]) ?>
        <?php snippet('post-meta',['post' => $page]) ?>
    </div>

  </article>


</main>

<?php snippet('footer') ?>
