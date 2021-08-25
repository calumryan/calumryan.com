<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="robots" content="index,follow" />
<link rel="pingback" href="https://webmention.io/calumryan.com/xmlrpc" />
<link rel="webmention" href="https://webmention.io/calumryan.com/webmention" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@calum_ryan" />
<meta name="twitter:site:id" content="77453936" />
<meta name="twitter:creator" content="@calum_ryan" />
<meta name="twitter:creator:id" content="77453936" />
<meta name="twitter:url" content="<?= $page->url() ?>" />
<?php if ( $page->parents() == 'notes' || $page->parents() == 'checkins' ) : ?>
<meta name="twitter:title" content="<?= $page->title() ?> at <?= $page->date()->toDate('H:i T') ?>" />
<meta name="og:title" content="<?= $page->title() ?> at <?= $page->date()->toDate('H:i T') ?>" />
<?php elseif ($page->isHomePage()): ?>
<meta name="twitter:title" content="Calum Ryan - Accessibility first, Front-End Web Developer" />
<meta name="og:title" content="Calum Ryan - Accessibility first, Front-End Web Developer" />
<?php else : ?>
<meta name="twitter:title" content="<?= $page->title() ?>" />
<meta name="og:title" content="<?= $page->title() ?>" />
<?php endif ?>
<?php if ( $page->description()->isNotEmpty() ) : ?>
<meta name="twitter:text:description" content="<?= $page->description() ?>" />
<meta name="og:description" content="<?= $page->description() ?>" />
<meta name="description" content="<?= $page->description() ?>">
<?php elseif ( $page->parents() == 'notes' ) : ?>
<meta name="twitter:text:description" content="<?= $page->text() ?>" />
<meta name="og:description" content="<?= $page->text() ?>" />
<meta name="description" content="<?= $page->text() ?>" />
<?php endif ?>
<?php if ( $image = $page->og_thumbnail()->toFile() ) : ?>
<meta name="twitter:image" content="<?php echo $image->resize(1000)->url() ?>">
<meta property="og:image" content="<?php echo $image->resize(1000)->url() ?>" />
<?php elseif ( $page->thumbnail()->isNotEmpty() ) : ?>
<meta name="twitter:image" content="<?= $site->url().'/'.$page->thumbnail() ?>">
<meta property="og:image" content="<?= $site->url().'/'.$page->thumbnail() ?>" />
<?php elseif ( $page->parents() == 'bookmarks' ) : ?>
<?php else: ?>
<meta name="twitter:image" content="<?= $site->url() ?>/assets/images/icon.png">
<meta property="og:image" content="<?= $site->url() ?>/assets/images/icon.png" />
<?php endif ?>
<meta name="og:url" content="<?= $page->url() ?>" />
<link rel="canonical" href="<?= $page->url() ?>">
<meta name="theme-color" content="#352748">
<meta name="application-name" content="Calum Ryan">
<meta name="author" content="Calum Ryan" />
<link rel="author" href="<?= $site->url() ?>/about" title="About the author" />
<link rel="apple-touch-icon" href="<?= $site->url() ?>/assets/images/apple-touch-icon.png" type="image/png" />
<link rel="shortcut icon" href="<?= $site->url() ?>/assets/images/icon.png" sizes="300x300" type="image/png" />
<link rel="icon" href="<?= $site->url() ?>/assets/images/favicon-96x96.png" sizes="96x96" type="image/png" />
<link rel="icon" href="<?= $site->url() ?>/assets/images/favicon-32x32.png" sizes="32x32" type="image/png" />
<link rel="icon" href="<?= $site->url() ?>/assets/images/favicon-16x16.png" sizes="16x16" type="image/png" />
<link rel="manifest" href="<?= $site->url() ?>/manifest.json" />