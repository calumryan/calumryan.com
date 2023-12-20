<?php snippet('profile') ?>
<div>
<h1>Seasons Greetings</h1>
</div>
<div class="p-note">
<?= $page->special()->kt() ?>
</div>
<div hidden>
<a rel="me" href="https://fed.brid.gy/r/https://calumryan.com/">Web site</a>
<?php if ($about = page('about')): ?>
<?php foreach ($about->social()->toStructure() as $social): ?>
<a class="link u-url url" href="<?= $social->url() ?>" rel="me"><?= $social->platform() ?></a>
<?php endforeach; endif; ?>
<a class="link u-url url" href="https://indieweb.org/User:Calumryan.com" rel="me">IndieWeb User:Calumryan.com</a>
<?php if ($home = page('home')) : if ( $home->banner()->isNotEmpty() ): ?>
<?php $image = $home->banner()->toFile(); ?>
<img class="u-featured" src="<?= $image->resize(1200)->url() ?>" alt="<?= $image->alt() ?>" />
<?php endif; endif; ?>
</div>