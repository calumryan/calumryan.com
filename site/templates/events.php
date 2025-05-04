<?php snippet('header') ?>

<div class="book__main"><main id="content" class="page ">

  <div>
    <div class="summary">
    <?= $page->text()->kt() ?> 
    </div>
    <section class="map map-events"> 
      <div id="mapcontainer"></div>
    </section>
    <div class="notes">
      <?php foreach ($notes = $page->children()->listed()->sortBy('date', 'desc')->paginate(8) as $note): ?>
      <?php 
            $content_type = $note->parent();
            $snippet_path = 'content-'.$content_type; 
            snippet($snippet_path,['post' => $note]);

            $lon = $note->longitude() ? strval($note->longitude()) : NULL;
            $lat = $note->latitude() ? strval($note->latitude()) : NULL;

            $maps_array[] = array(
              'type' => 'Feature',
              'properties' => [
                'name' => strval($note->title()),
                'description' => NULL,
                'url' => strval($note->url())
              ],
              'geometry' => [
                'type' => "Point",
                'coordinates' => [floatval($lon), floatval($lat)]
              ]
            );
      ?>
      <?php endforeach ?>
      <?php
      $maps_array_overall = array(
        'type' => 'FeatureCollection',
        'name' => 'Places',
        'crs' => [
          'type' => 'name',
          'properties' => [
            'name' => 'urn:ogc:def:crs:OGC:1.3:CRS84'
          ]
        ],
        'features' => $maps_array
      );
      ?>
    </div>
    <script id="mapdata" type="application/json"><?= json_encode($maps_array_overall); ?></script>
    <script src="<?= $site->url() ?>/assets/js/map.js"></script>
  <div>
    
  <?php snippet('pagination',['notes' => $notes]); ?>

</main>

<?php snippet('footer') ?>
