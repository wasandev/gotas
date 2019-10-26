<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\HasMany;

class Post extends Resource
{
    public static $displayInNavigation = false;
    public static $group = "4.งานด้านการขาย";
    //public static $subGroup = "Online Marketing";
    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Models\Tenant\Post::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'title', 'content'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return 'โพส';
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return  string
     */
    public static function singularLabel()
    {
        return __('Post');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('Id'),  'id')
                ->rules('required')
                ->sortable(),
            Boolean::make('เผยแพร่', 'published')
                ->rules('required')
                ->sortable(),
            BelongsTo::make('User')
                ->rules('required')
                ->searchable()

                ->sortable(),
            Text::make(__('Title'),  'title')
                ->rules('required')

                ->sortable(),
            Textarea::make(__('Content'),  'content')
                ->rules('required')
                ->hideFromIndex()
                ->sortable(),
            Image::make(__('Image'),  'image')
                ->hideFromIndex()
                ->sortable(),

            DateTime::make(__('Published At'),  'published_at')
                ->hideFromIndex()
                ->sortable(),
            HasMany::make('ความเห็น', 'comments', 'App\Nova\Comment')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
