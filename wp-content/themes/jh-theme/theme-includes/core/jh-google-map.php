<?php
/**
 * Google Map ACF API Key
 */

function my_acf_google_map_api( $api ) {
    $api['key'] = 'AIzaSyDPEng8fkd9N8nWbWDZBjoyKT0Q_ZM1r2Q';
    return $api;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');