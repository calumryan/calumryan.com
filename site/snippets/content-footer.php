<footer class="note__meta post-meta">
  <div>
  <?php snippet('speaker-small', ['page' => $post]) ?>
  </div>
  <a href="<?= $post->url() ?>" class="u-url link">
    <time
      datetime="<?= $post->date()->toDate('Y-m-d\TH:i:sP') ?>"
      class="dt-published"
      ><?= $post->date()->toDate('j F Y') ?> at
      <?= $post->date()->toDate('H:i T') ?></time
    ></a
  >
  <div hidden class="h-card p-author"><a class="p-name u-url" rel="author" href="https://calumryan.com/">Calum Ryan</a><img class="u-photo" src="<?= $site->url() ?>/assets/images/icon.png?v20250404" alt=""></div>
</footer>