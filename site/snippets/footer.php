<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * in loops or simply to keep your templates clean.
 * This footer snippet is reused in all templates. In fetches information from the `site.txt` content file
 * and from the `about` page.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>



  <footer class="footer">
    <div class="footer__container container">
      <a href="#header" class="link footer__skip"><svg aria-hidden="true" role="img" width="12" height="12"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-arrow-up"></use></svg> Back to top of page</a>
      <small>Content and code is under a <a class="link" rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY-NC-SA 4.0</a> license</small><br>

      <?php if ($about = page('about')): ?>
      <nav class="social" aria-label="Follow">
        <?php foreach ($about->social()->toStructure() as $social): ?>
        <a class="link" href="<?= $social->url() ?>"><span class="sr-only">Calum's profile on <?= $social->platform() ?></span><svg aria-hidden="true" focusable="false" class="icon" width="40" height="40"><title></title><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-<?= $social->icon() ?>"></use></svg></a>
        <?php endforeach ?>
        <a class="link" href="<?= $site->url() ?>/rss" aria-label="RSS feeds"><svg class="icon" width="40" height="40"><title></title><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-rss"></use></svg></a>
      </nav>
      <?php endif ?>
    </div>
  </footer>

  <script src="<?= $site->url() ?>/assets/js/main.js?v20200704" defer="defer"></script>

</body>
</html>
