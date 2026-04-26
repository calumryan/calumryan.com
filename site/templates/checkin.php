<?php snippet('header') ?>

<div class="book__main"><main id="content" class="page page__center">

  <article class="note note-structure note-text note-short h-entry">
    <h1 class="p-name" hidden><?= $page->title() ?></h1>

    <div class="note-content e-content">
      <?= $page->text()->kt(); ?>
    </div>

    <?php
    // Decode JSON fields if present
    $rawVenue = str_replace(["\n", "\r"], '', $page->location_data()->value());
    $venue = $rawVenue ? json_decode($rawVenue, true) : null;

    $rawAddress = str_replace(["\n", "\r"], '', $page->address_data()->value());
    $address = $rawAddress ? json_decode($rawAddress, true) : null;
    ?>

    <?php if ($venue): ?>
      <div class="checkin-venue">
        <h2>Checked in at <?= $venue['properties']['name'][0] ?? '' ?></h2>
        <p>
          <?= $venue['properties']['locality'][0] ?? '' ?>,
          <?= $venue['properties']['region'][0] ?? '' ?>,
          <?= $venue['properties']['country-name'][0] ?? '' ?>
        </p>
        <?php if (!empty($venue['properties']['latitude'][0]) && !empty($venue['properties']['longitude'][0])): ?>
          <p>Coordinates: <?= $venue['properties']['latitude'][0] ?>, <?= $venue['properties']['longitude'][0] ?></p>
        <?php endif ?>
        <?php if (!empty($venue['properties']['url'])): ?>
          <p>Links:
            <?php foreach ($venue['properties']['url'] as $url): ?>
              <a href="<?= $url ?>"><?= $url ?></a><br>
            <?php endforeach ?>
          </p>
        <?php endif ?>
      </div>
    <?php endif ?>

    <?php if ($page->location_data()->isNotEmpty()): ?>
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
