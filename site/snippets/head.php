<?php snippet('meta') ?>
<link rel="me" href="https://github.com/calumryan">
<link rel="me" href="https://twitter.com/calum_ryan">
<link rel="me" href="https://micro.blog/calumryan" />
<link rel="me" href="mailto:hello@calumryan.com" />

<?= selfauthEndpoint() ?>
<?php if (strpos($_SERVER['HTTP_HOST'], 'calumryan.com') !== false) : micropublisherEndpoints(); endif; ?>
<link rel="microsub" href="https://aperture.p3k.io/microsub/151">

<script async defer data-domain="calumryan.com" src="https://plausible.io/js/plausible.js"></script>

<?php snippet('feeds-header') ?>

<!-- Hey thanks for checking out the source code, this is where the magic happens! -->
<!-- If you'd like to suggest anything to improve or need assistance then get in touch -->
<!-- Email hello@calumryan.com -->
