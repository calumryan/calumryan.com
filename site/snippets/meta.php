<?php
/**
 * meta.php — Clean metadata + OpenGraph + JSON‑LD for Bluesky
 * Drop into /site/snippets/meta.php and include in your templates:
 * <?php snippet('meta') ?>
 */

// --- Webmention ---
?>
<link rel="pingback" href="https://webmention.io/www.calumryan.com/xmlrpc" />
<link rel="webmention" href="https://webmention.io/www.calumryan.com/webmention" />

<?php
// --- Title logic ---
if ($page->parents() == 'notes' || $page->parents() == 'checkins') {
    $ogTitle = $page->title() . ' at ' . $page->date()->toDate('H:i T');
} elseif ($page->isHomePage()) {
    $ogTitle = 'Calum Ryan - Accessibility Specialist';
} else {
    $ogTitle = $page->title()->value();
}

// --- Description logic ---
if ($page->description()->isNotEmpty()) {
    $ogDescription = $page->description()->value();
} elseif ($page->parents() == 'notes') {
    $ogDescription = $page->text()->value();
} else {
    $ogDescription = null;
}

// --- Image logic ---
if ($image = $page->og_thumbnail()->toFile()) {
    $ogImage = $image->resize(1200)->url();
} elseif ($page->thumbnail()->isNotEmpty()) {
    $ogImage = $site->url() . '/' . $page->thumbnail();
} elseif ($page->parents() == 'bookmarks') {
    $ogImage = null;
} else {
    $ogImage = $site->url() . '/assets/images/icon.png';
}

// --- JSON‑LD Article schema (Bluesky-friendly) ---
$jsonLd = [
    '@context'      => 'https://schema.org',
    '@type'         => 'Article',
    'headline'      => $ogTitle,
    'description'   => $ogDescription,
    'url'           => $page->url(),
    'author'        => 'Calum Ryan',
];

if ($ogImage) {
    $jsonLd['image'] = $ogImage;
}

if ($page->date()->isNotEmpty()) {
    $jsonLd['datePublished'] = $page->date()->toDate('Y-m-d');
}
?>

<!-- OpenGraph -->
<meta property="og:title" content="<?= $ogTitle ?>" />
<?php if ($ogDescription): ?>
<meta property="og:description" content="<?= $ogDescription ?>" />
<meta name="description" content="<?= $ogDescription ?>" />
<?php endif; ?>
<meta property="og:url" content="<?= $page->url() ?>" />
<meta property="og:type" content="article" />
<?php if ($ogImage): ?>
<meta property="og:image" content="<?= $ogImage ?>" />
<?php endif; ?>

<!-- Canonical -->
<link rel="canonical" href="<?= $page->url() ?>">

<!-- JSON‑LD -->
<script type="application/ld+json">
<?= json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
</script>

<!-- Site metadata -->
<meta name="theme-color" content="#352748">
<meta name="application-name" content="Calum Ryan">
<meta name="author" content="Calum Ryan" />
<link rel="author" href="<?= $site->url() ?>/about" title="About the author" />

<!-- Icons -->
<link rel="apple-touch-icon" href="<?= $site->url() ?>/assets/images/apple-touch-icon.png" type="image/png" />
<link rel="shortcut icon" href="<?= $site->url() ?>/assets/images/icon.png" sizes="300x300" type="image/png" />
<link rel="icon" href="<?= $site->url() ?>/assets/images/favicon-96x96.png" sizes="96x96" type="image/png" />
<link rel="icon" href="<?= $site->url() ?>/assets/images/favicon-32x32.png" sizes="32x32" type="image/png" />
<link rel="icon" href="<?= $site->url() ?>/assets/images/favicon-16x16.png" sizes="16x16" type="image/png" />
<link rel="manifest" href="<?= $site->url() ?>/manifest.json" />
