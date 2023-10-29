<?php snippet('profile') ?>
<div>
<h1 lang="it">Ciao!</h1>
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
</div>