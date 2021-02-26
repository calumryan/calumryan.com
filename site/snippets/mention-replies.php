<details class="webmetion-details p-comment">
    <summary>
        <h3 id="webmention-replies" class="link">Replies (<?= count($replies) ?>)</h3>
    </summary>
    <ol class="webmentions__list webmentions__list__replies">

        <?php foreach ( $replies as $item ) : ?>
        <?php if ( isset( $item->data->author->name ) ) : $name = $item->data->author->name; ?>
        <li class="webmentions__item">
            <div class="webmention" id="webmention-<?= $item->id ?>">
                <div class="webmention__meta">
                    <?php if ( $item->data->author->url ) : ?>
                    <a class="webmention__author h-card u-url" href="<?= $item->data->author->url; ?>" target="_blank" rel="noopener noreferrer">
                        <?php if ( $item->data->author->photo ) : ?>
                        <img class="webmention__author__photo u-photo" src="<?= $item->data->author->photo; ?>" alt="Author of reply: <?= $name; ?>" loading="lazy" width="60" height="60">
                        <?php endif; ?>
                        <strong class="p-name"><?= $name; ?></strong>
                    </a>
                    <?php endif ?>
                    <?php
                    // Reply date
                    if ( $item->data->published ) :
                        $date = strtotime($item->data->published);
                        $dateFormatted = date('d F Y',$date);
                        $dateUniv = date('Y-m-d\TH:i:sP',$date);
                    ?>
                    <span class="webmention__meta__divider" aria-hidden="true">⋅</span><time class="webmention__pubdate dt-published" datetime="<?= $dateUniv ?>"><?= $dateFormatted ?></time>
                    <?php endif ?>
                </div>
                <?php // Reply contents
                    if ( $item->data->content ) : 
                        $umention = array('<a class="u-mention" href="https://twitter.com/calum_ryan"></a>','<a class="u-mention" href="https://calumryan.com/"></a>');
                        $content = str_replace($umention,'',$item->data->content);
                ?>
                <div class="webmention__content p-content"><?= $content; ?></div>
                <?php endif ?>
            </div>
        </li>
        <?php endif; endforeach; ?>
    </ol>
</details>