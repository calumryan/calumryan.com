<?php snippet('meta') ?>
<link rel="self" href="https://calumryan.com/">
<link rel="me" href="https://toot.cafe/@calumryan">
<link rel="me" href="https://micro.blog/calumryan" />
<link rel="me" href="mailto:hello@calumryan.com" />
<link rel="me" href="https://fed.brid.gy/r/https://calumryan.com/">

<?php // selfauthEndpoint() ?>
<?php if (strpos($_SERVER['HTTP_HOST'], 'calumryan.com') !== false) : micropublisherEndpoints(); endif; ?>
<link rel="microsub" href="https://aperture.p3k.io/microsub/151">

<?php snippet('feeds-header') ?>

<!-- Hey thanks for checking out the source code, this is where the magic happens! -->
<!-- If you'd like to suggest anything to improve or need assistance then get in touch -->
<!-- Email hello@calumryan.com -->
