<?php 

    if ( $page->locator()->isNotEmpty() ) :
        $location = $page->locator()->yaml(); 
    elseif ( $page->location_data()->isNotEmpty() ):
        foreach ($page->location_data()->toStructure() as $loc):
        $property = $loc->properties()->yaml();
        endforeach;
    endif;

    if(!empty($location['lat'])) {
        $latitude =  $location['lat'];
        $longitude =  $location['lon'];
    } elseif( $page->latitude()->isNotEmpty() ) {
        $latitude =  $page->latitude();
        $longitude = $page->longitude();
    } elseif( $page->location_data()->isNotEmpty() ) {
        $latitude =  $property['latitude'][0];
        $longitude = $property['longitude'][0];
    }
?>


<?php if ( isset($latitude) ) : ?>
<?php $string = 'Checked in at '; ?>
<a class="link p-location" href="http://www.openstreetmap.org/?mlat=<?= $latitude ?>&mlon=<?= $longitude ?>&zoom=12"><svg class="icon icon--location" aria-hidden="true" width="20" height="20"><use xmlnsXlink="http://www.w3.org/1999/xlink" xlink:href="<?= $site->url() ?>/assets/icons/icons.sprite.svg#icon-location"></use></svg><span class="sr-only">View location on OpenStreet map of <?= str_replace($string,'', $page->text()) ?></span></a>   
<span class="h-adr" hidden>
<?php if ( $page->locatility()->isNotEmpty() ) : ?><span class="p-locality"><?= $page->locatility() ?></span><?php endif ?>
<?php if ($page->region()->isNotEmpty() ) : ?><span class="p-region"><?= $page->region() ?></span>,<?php endif ?>
<?php if ($page->country()->isNotEmpty() ) : ?><span class="p-country"><?= $page->country() ?></span><?php endif ?>
<?php if (isset($latitude) ) : ?><data class="p-latitude" value="<?= $latitude ?>"></data><?php endif ?>
<?php if (isset($longitude) ) : ?><data class="p-longitude" value="<?= $longitude ?>"></data><?php endif ?>
</span><?php endif ?>