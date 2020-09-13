<nav aria-label="Secondary navigation" class="nav-horizontal">
    <h2 class="heading">View more content on calumryan.com</h2>
    <?php if ($site_menu = page('site-menu')): ?>
      <ul>
        <?php foreach ($site_menu->links()->toStructure() as $item): ?>
        <li><a class="link icon-inline bg-fallback bg-<?= str_replace('/','',$item->url()) ?>" href="<?= $item->url() ?>"><?php if ( $item->icon()->isNotEmpty() ): ?><svg aria-hidden="true" class="icon" role="img" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-<?= $item->icon() ?>"></use></svg><?php endif; ?><?= $item->title() ?></a></li>
        <?php endforeach ?>
        </ul>
    <?php endif ?>
</nav>