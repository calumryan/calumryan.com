<?php snippet('header') ?>

<div class="book__main"><main id="content" class="page ">

  <div>
    <div class="notes">
      <?php foreach ($notes = $page->children()->listed()->sortBy('date', 'desc')->paginate(20) as $note): ?>
        <?php 
              $content_type = $note->parent();
              $snippet_path = 'content-'.$content_type; 
              snippet($snippet_path,['post' => $note]);
        ?>
        <?php endforeach ?>
    </div>
  </div>

  <?php snippet('pagination',['notes' => $notes]); ?>

</main>

<?php snippet('footer') ?>
