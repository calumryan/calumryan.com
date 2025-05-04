<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * in loops or simply to keep your templates clean.
 * This intro snippet is reused in multiple templates. While it does not contain much code,
 * it helps to keep your code DRY and thus facilitate maintenance when you have to make changes.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<div class="intro <?php if ( $page->special()->isNotEmpty()) { echo 'h-card'; } ?>">
  <?php if ( $page->special()->isNotEmpty() ) :?>
    <?php snippet('h-card', ['page' => $page]); ?>
    <span hidden class="p-name">Calum Ryan</span>
  <?php elseif ( $page->about_feature()->isNotEmpty() ) :?>
  <h1><?= $page->title() ?></h1>
  <?= $page->about_feature()->kt() ?>
  <?php else: ?>
  <h1><?= $page->title() ?></h1>
  <?php endif ?>
  <?php if ( $page->svg()->isNotEmpty() ) :?>
  <svg class="icon" aria-hidden="true" focusable="false" width="150" height="150"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#<?= $page->svg() ?>"></use></svg>
  <?php endif ?>
  <?php if ( $page->date()->isNotEmpty() && $page->parents() != 'notes' && $page->parents() != 'events' && $page->parents() != 'checkins' && $page->parents() != 'rsvps' && $page->parents() != 'replies' && $page->parents() != 'likes' && $page->parents() != 'reposts' ) :?>
  <time class="note-date"><?= $page->date()->toDate('j F Y') ?></time>
  <?php endif ?>
  <?php if ( $page->parents() == 'notes' || $page->parents() == 'checkins' || $page->parents() == 'replies') :?>
  <time class="note-date"><?= $page->date()->toDate('H:i T') ?></time>
  <?php endif ?>
  <?php if ( $page->parents() == 'notes' || $page->parents() == 'checkins') :?>
  <div class="note__meta">
  <?php snippet('location', ['page' => $page]) ?>
  <?php snippet('weather', ['page' => $page]) ?>
  </div>
  <?php endif ?>
  <?php snippet('tags', ['page' => $page]); ?>
  <?php snippet('dates', ['page' => $page]); ?>

</div>
