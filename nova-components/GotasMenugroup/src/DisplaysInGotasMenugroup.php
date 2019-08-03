<?php

namespace Wasandev\GotasMenugroup;


use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait DisplaysInGotasMenugroup
{
    /**
     * Get meta information about this resource for client side comsumption.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static function additionalInformation(Request $request)
    {
        return array_merge(parent::additionalInformation($request), [
            'group' => static::$group,
            'groupSlug' => static::$group,
            'subGroup' => static::$subGroup ?? null,
            'subGroupSlug' => isset(static::$subGroup) ? static::$subGroup : null,
            //'subGroupSlug' => isset(static::$subGroup) ? Str::slug(static::$subGroup) : null,
        ]);
    }
}
