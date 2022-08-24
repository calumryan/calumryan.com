<details class="webmetion-details p-comment">
    <summary>
        <h3 id="webmention-links" class="link">Linked/mentioned (<?= count($links) ?>)</h3>
    </summary>

    <ol class="webmentions__list webmentions__list__grid">

        <?php foreach ( $links as $item ) : ?>
        <li class="webmentions__item webmention--<?= $item->activity->type; ?>">
        <?php if ( $item->data->url ) : ?><a class="u-url link" href="<?= $item->data->url; ?>" target="_blank" rel="noopener noreferrer"><?= $item->data->url; ?></a><?php endif; ?>
        </li>
        <?php endforeach; ?>

    </ol>
</details>