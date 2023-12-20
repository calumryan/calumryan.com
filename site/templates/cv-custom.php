<!doctype html>
<html lang="en">
<head>

  <title>Calum Ryan – CV</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="robots" content="noindex,nofollow" />
  <?php snippet('head'); ?>
  <link href="<?= $site->url() ?>/assets/css/main.css?v20231029" rel="stylesheet">

</head>

  <body>

    <main id="content" class="page">

        <article class="text text-article text-cv note-structure h-entry">

          <h1>Calum Ryan</h1>
          <?php if ( $page->description()->isNotEmpty() ) : ?><p class="text-medium"><strong><?= $page->description(); ?></strong></p><?php endif; ?>

          <h2>About me</h2>
          <?= $page->text()->kt() ?>

          <hr />
          
          <h2>Experience</h2>
          <?= $page->experience()->kt() ?>

          <hr />

          <h2>Contact me</h2>

          <dl>
            <dt>Address</dt>
            <dd><?= $page->address() ?></dd>

            <dt>Telephone</dt>
            <dd><?= $page->telephone() ?></dd>

            <dt>Email</dt>
            <dd><a href="mailto:hello@calumryan.com">hello@calumryan.com</a></dd>

            <dt>Mastodon</dt>
            <dd><a href="https://toot.cafe/@calumryan">@calumryan@toot.cafe</a></dd>

            <dt>Website</dt>
            <dd><a href="https://www.calumryan.com">calumryan.com</a></dd>
          </dl>

        </article>

    </main>

  </body>
</html>

