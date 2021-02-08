<nav id="menu" class="menu" aria-label="Primary">
<ul>
<?php 
// In the menu, we only fetch listed pages, i.e. the pages that have a prepended number in their foldername
// We do not want to display links to unlisted `error`, `home`, or `sandbox` pages
// More about page status: https://getkirby.com/docs/reference/panel/blueprints/page#statuses
foreach ($site->children()->listed() as $item): ?>
    <li><?= $item->title()->link() ?></li>
<?php endforeach ?>
</ul>
</nav>