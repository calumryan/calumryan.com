<div hidden><a class="u-author" rel="author" href="https://calumryan.com/">Calum Ryan</a></div>
<?php if ( $post->syndication()->isNotEmpty() ) : ?><a class="u-syndication" rel="noopener" href="<?= $post->syndication() ?>" hidden>Swarm</a><?php endif ?>
<?php snippet('published', ['post' => $page]) ?>
<?php if ($page->tags()->isNotEmpty()) : ?>
<div hidden><?php snippet('tags', ['page' => $page]) ?><a href="<?= $page->url() ?>" class="u-url"><?= $page->url() ?></a></div>
<?php endif ?>