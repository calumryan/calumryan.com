<?php if ( $post->feature_images()->isNotEmpty() ) : ?>
<svg style="display:none">
  <symbol id="arrow-left" viewBox="0 0 10 10">
    <path fill="currentColor" d="m9 4h-4v-2l-4 3 4 3v-2h4z"/>
  </symbol>
  <symbol id="arrow-right" viewBox="0 0 10 10">
    <path fill="currentColor" d="m1 4h4v-2l4 3-4 3v-2h-4z"/>
  </symbol>
</svg>

<div class="note-image gallery">
  <div role="region" tabindex="0" aria-describedby="instructions" role="region" aria-label="gallery">
    <ul>
      <?php
      $images =  $post->feature_images()->toFiles();
      foreach($images as $image): 
      ?>
      <li>   
        <a href="<?= $image->url() ?>">
          <figure>
            <img data-src="<?= $image->url() ?>" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' /%3E" alt="<?= $image->alt() ?>">
            <noscript>
              <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
            </noscript>
          </figure>
        </a>
      </li>
      <?php endforeach ?>
    </ul>
  </div>

  <div id="instructions">
    <p id="touch">
      <svg aria-hidden="true" focusable="false"><use xlink:href="#arrow-left"></use></svg>
      swipe for more
      <svg aria-hidden="true" focusable="false"><use xlink:href="#arrow-right"/></svg>
    </p>
    <p id="hover">
      <svg aria-hidden="true" focusable="false"><use xlink:href="#arrow-left"></use></svg>
      scroll for more
      <svg aria-hidden="true" focusable="false"><use xlink:href="#arrow-right"/></svg>
    </p>
    <p id="focus">
      <svg aria-hidden="true" focusable="false"><use xlink:href="#arrow-left"></use></svg>
      use your arrow keys for more
      <svg aria-hidden="true" focusable="false"><use xlink:href="#arrow-right"/></svg>
    </p>
    <p id="hover-and-focus">
      <svg aria-hidden="true" focusable="false"><use xlink:href="#arrow-left"></use></svg>
      scroll or use arrow keys for more
      <svg aria-hidden="true" focusable="false"><use xlink:href="#arrow-right"/></svg>
    </p>
  </div>

</div>
<?php endif ?>