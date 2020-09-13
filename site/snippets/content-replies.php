<article class="note">
  <header class="note-header">
    <h2 class="sr-only"><?= $post->date()->toDate('d F Y') ?></h2>
    <div>
    <?php snippet('reply',['post' => $post]) ?>
    </div>
  </header>
  <?php snippet('content-footer',['post' => $post]) ?>
</article>