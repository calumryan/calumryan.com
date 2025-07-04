<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * This header snippet is reused in all templates. 
 * It fetches information from the `site.txt` content file and contains the site navigation.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<!doctype html>
<html lang="en">
<head>

  <?php if ($page->isHomePage()): ?>
  <title><?= $site->title() ?> - Accessibility Specialist</title>
  <?php elseif ( $page->parents() == 'notes' || $page->parents() == 'checkins' ) : ?>
  <title><?= $page->title() ?> at <?= $page->date()->toDate('H:i T') ?> - <?= $site->title() ?></title>
  <?php else : ?>
  <title><?= $page->title() ?> - <?= $site->title() ?></title>
  <?php endif ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="robots" content="index,follow" />
  <?php snippet('head'); ?>
  <link href="<?= $site->url() ?>/assets/css/main.css?v2025040403" rel="stylesheet">
</head>
<body class="book">

  <!-- Firefox fouc fix -->
  <script>0</script>

  <a id="skip-nav" class="skip-nav" href="#content">Skip to main content</a>

  <?php $page->parent() ? $page_class = $page->parent() : $page_class = $page->slug(); ?>
  <header id="header" class="header book__side <?= 'book__side__'.$page_class ?>">
    <div>

      <div class="header__container container">

        <div class="header__strip">
          <div class="site-title">
            <a class="logo p-name u-url" href="<?= $site->url() ?>" rel="home"><?php snippet('petals-outline') ?>Calum Ryan<span class="sr-only"> homepage</span></a>
          </div>

          <div class="header__menu">
            <a class="header__link" href="<?= $site->url() ?>/site-menu">Site menu</a>
            <a class="header__search" href="<?= $site->url() ?>/search" aria-label="Search website"><svg class="icon icon--search" width="30" height="30"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-search"></use></svg></a>
          </div>

        </div>

        <nav aria-label="Short" class="header__navigation nav-horizontal">
          <?php if ($site_menu = page('site-menu')): ?>
          <ul>
            <?php foreach ($site_menu->links()->toStructure() as $item): ?>
            <?php if ( $item->special()->isNotEmpty() ) : ?>
            <li><a class="link icon-inline bg-fallback bg-<?= str_replace('/','',$item->url()) ?>" href="<?= $item->url() ?>"><?php if ( $item->icon()->isNotEmpty() ): ?><svg aria-hidden="true" focusable="false" class="icon" role="img" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-<?= $item->icon() ?>"></use></svg><?php endif; ?><?= $item->title() ?></a></li>
            <?php endif ?>
            <?php endforeach ?>
          </ul>
          <?php endif ?>
        </nav>

        <?php snippet('intro') ?>
      </div>
    </div>
  </header>

