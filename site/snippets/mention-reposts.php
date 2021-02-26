<details class="webmetion-details p-comment">
    <summary>
        <h3 id="webmention-reposts" class="webmention-reposts link">Reposts (<?= count($reposts) ?>)</h3>
    </summary>

    <ol class="webmentions__list webmentions__list__grid">

        <?php foreach ( $reposts as $item ) : ?>
        <?php if ( isset( $item->data->author->name ) ) : $name = $item->data->author->name; ?>
        <li class="webmentions__item webmention--<?= $item->activity->type; ?>">
            <article class="h-cite webmention  webmention--author-starts">
                <div class="webmention__author p-author h-card">
                    <?php if ( $item->data->url ) : ?><a class="u-url" href="<?= $item->data->url; ?>" target="_blank" rel="noopener noreferrer">
                        <?php endif; ?>
                        <?php if ( $item->data->author->photo ) : ?><img class="webmention__author__photo u-photo" src="<?= $item->data->author->photo; ?>"
                            alt="<?= $name; ?>" title="<?= $name; ?>">
                        <?php endif; ?>
                        <?php if ( $item->data->author->url ) : ?></a>
                    <?php endif; ?>
                </div>

            </article>

        </li>
        <?php endif; endforeach; ?>

    </ol>
</details>