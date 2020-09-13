<?php if ($page->tags()->isNotEmpty()) : ?>
<ul class="list note-tags tags">
    <?php foreach ($page->tags()->split(',') as $tag): ?>
    <li><a class="p-category link" rel="tag" href="/search?q=<?= $tag ?>"><?= $tag ?></a></li>
    <?php endforeach ?>
</ul>
<?php endif ?>