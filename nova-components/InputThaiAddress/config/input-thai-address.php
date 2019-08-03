<?php

return [
  'api_key' => env('GOOGLE_MAPS_API_KEY', ''),
  'language' => env('GOOGLE_MAPS_LANGUAGE', 'th'),
  'default_latitude'  => env('GMAPS_DEFAULT_LATITUDE'),
  'default_longitude' => env('GMAPS_DEFAULT_LONGITUDE'),
  'default_zoom'      => env('GMAPS_DEFAULT_ZOOM', 16),
];
