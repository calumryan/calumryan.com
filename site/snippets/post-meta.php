<div hidden class="h-card p-author"><a class="p-name u-url" rel="author" href="https://calumryan.com/">Calum Ryan</a><img class="u-photo" src="<?= $site->url() ?>/assets/images/icon.png?v20200704"></div>
<?php if ( $post->syndication()->isNotEmpty() ) : ?><a class="u-syndication" rel="noopener" href="<?= $post->syndication() ?>" hidden>Swarm</a><?php endif ?>
<?php snippet('published', ['post' => $page]) ?>
<?php if ($page->tags()->isNotEmpty()) : ?>
<div hidden><?php snippet('tags', ['page' => $page]) ?></div>
<?php endif ?>