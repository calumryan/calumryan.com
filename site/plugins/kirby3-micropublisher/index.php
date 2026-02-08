<?php

/**
 * Kirby 3 Micropublisher
 *
 * @version   1.0-beta.4
 * @author    Sebastian Greger <msg@sebastiangreger.net>
 * @copyright Sebastian Greger <msg@sebastiangreger.net>
 * @link      https://github.com/sebastiangreger/kirby3-micropublisher
 * @license   MIT
 */

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('sgkirby/micropublisher', [

    'options' => [
        'slugprefix'                    => '',
        'auth.authorization-endpoint'   => 'https://indieauth.com/auth',
        'auth.token-endpoint'           => 'https://tokens.indieauth.com/token',
        'syndicate-to'                  => [],
        'categorylist.parent'           => 'home',
        'categorylist.taxonomy'         => 'tags',
    ],

    'routes' => require __DIR__ . '/config/routes.php',

    'hooks' => [
        'page.update:after' => function ($newPage) {

            // get weather
            if( $newPage->location_data()->isNotEmpty() ) {

                try {
                    $key = 'cd586864beed8f4b398d8747231dccba';
                    
                    foreach ($newPage->location_data()->toStructure() as $loc):
                        $property = $loc->properties()->yaml();
                    endforeach;
    
                    $latitude = $property['latitude'][0];
                    $longitude = $property['longitude'][0];
                    $content = 'Checked in at ' . $property['name'][0];

                    $json = file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&appid=$key&units=metric");
                    $obj = json_decode($json, true);
                    $celsius = round($obj['main']['temp']).'°C';
                    $description = $obj['weather'][0]['description'];
                    $condition = preg_replace('/[^a-z0-9\-]/', '-', $description);
                    $newPage->update(['text' => $content,'temperature' => $celsius,'weather_icon' => $condition]);
                    
                } catch (Exception $e) {

                    echo 'Caught exception: ',  $e->getMessage(), "\n";

                }
            }
        }
    ]

]);
