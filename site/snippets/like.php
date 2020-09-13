<?php $characters = array('https://','http://','www.'); ?>
<a class="u-like-of h-cite link link-long" href="<?= $post->permalink() ?>"><?= str_replace($characters,'',$post->permalink()) ?></a>