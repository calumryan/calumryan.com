<?php 
$character = array('Attending ','✅','Not attending '); 
?>
<svg class="icon" aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-rsvp-<?= $post->response() ?>"></use></svg> RSVP'd <strong class="p-rsvp"><?= $post->response() ?></strong> to <a class="u-in-reply-to in-reply-to link link-long p-name e-content" href="<?= $post->blink() ?>"><?php if ( $post->text() != 'Attending ✅¸' ) : echo str_replace($character,'',$post->text());  else: echo $post->blink(); endif;?></a>