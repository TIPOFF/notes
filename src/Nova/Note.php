<?php

declare(strict_types=1);

namespace Tipoff\Notes\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Tipoff\Support\Nova\Resource;

class Note extends Resource
{
    public static $model = \Tipoff\Notes\Models\Note::class;

    public static $title = 'content';

    public static $search = [
        'id',
    ];

    public static $group = 'Media';

    public function fieldsForIndex(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Content'),
            MorphTo::make('Noteable')->sortable(),
        ];
    }

    public function fields(Request $request)
    {
        return [
            Markdown::make('Content')->required(),

            MorphTo::make('Noteable')->types([
                User::class,
                Contact::class,
                Customer::class,
                Order::class,
                Booking::class,
                Game::class,
                Block::class,
                Slot::class,
            ]),

            new Panel('Data Fields', $this->dataFields()),

        ];
    }

    protected function dataFields()
    {
        return [
            ID::make(),
            BelongsTo::make('Created By', 'creator', \App\Nova\User::class)->exceptOnForms(),
            DateTime::make('Created At')->exceptOnForms(),
            DateTime::make('Updated At')->exceptOnForms(),
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }

    public function filters(Request $request)
    {
        return [];
    }

    public function lenses(Request $request)
    {
        return [];
    }

    public function actions(Request $request)
    {
        return [];
    }
}
