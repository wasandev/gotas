<?php

namespace Wasandev\InputThaiAddress;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class MapAddress extends Field
{
  public $component = 'map-address';
  public $textAlign = 'center';


  public function __construct($name, $attribute = null, $resolveCallback = null)
  {
    parent::__construct($name, $attribute, $resolveCallback);

    $this->latitude(config('input-thai-address.default_latitude'))
      ->longitude(config('input-thai-address.default_longitude'))
      ->zoom(config('input-thai-address.default_zoom'));
  }


  public function latitude($latitude)
  {
    return $this->withMeta(['latitude' => $latitude]);
  }


  public function longitude($longitude)
  {
    return $this->withMeta(['longitude' => $longitude]);
  }


  public function zoom($zoom)
  {
    return $this->withMeta(['zoom' => intval($zoom)]);
  }


  protected function fillAttributeFromRequest(NovaRequest $request, $requestAttribute, $model, $attribute)
  {
    $model->setAttribute($attribute, (object)[
      'latitude'  => array_get($request, $attribute . '.latitude'),
      'longitude' => array_get($request, $attribute . '.longitude'),
    ]);
  }
}
