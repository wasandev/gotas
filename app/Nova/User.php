<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsTo;

class User extends Resource
{
    //public static $displayInNavigation = false;
    public static $group = '1.งานสำหรับผู้ดูแลระบบ';
    //public static $subGroup = "ข้อมูลผู้ใช้งาน";

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tenant\User';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email',
    ];

    public static function label()
    {
        return 'ผู้ใช้งาน';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Gravatar::make(),

            Text::make('ชื่อผู้ใช้', 'name')
                ->sortable()
                ->rules('required', 'max:255')
                ->size('w-1/2'),

            Text::make('อีเมล', 'email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                //->updateRules('unique:users,email,{{resourceId}}')
                ->size('w-1/2'),

            Password::make('รหัสผ่าน', 'password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:6')
                ->updateRules('nullable', 'string', 'min:6')
                ->size('w-1/2'),
            BelongsTo::make('สังกัดสาขา', 'branch', 'App\Nova\Branch')
                ->size('w-1/2')->sortable()
                ->rules('required'),
            Select::make('สิทธิ์การใช้งาน', 'role')->options([
                'employee' => 'พนักงาน',
                'admin' => 'Admin',
                'customer' => 'ลูกค้า',
                'driver' => 'พนักงานขับรถ'
            ])->displayUsingLabels()
                ->size('w-1/2')
                ->rules('required'),
            BelongsToMany::make('Roles', 'roles', \Pktharindu\NovaPermissions\Nova\Role::class),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
