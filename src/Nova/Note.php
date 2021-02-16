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
use Tipoff\Support\Nova\BaseResource;

class Note extends BaseResource
{
    public static $model = \Tipoff\Notes\Models\Note::class;

    public static $title = 'content';

    public static $search = [
        'id',
    ];

    public static $group = 'Media';

    /** @psalm-suppress UndefinedClass */
    protected array $filterClassList = [

    ];

    public function fieldsForIndex(NovaRequest $request)
    {
        return array_filter([
            ID::make()->sortable(),
            Text::make('Content'),
            MorphTo::make('Noteable')->sortable(),
        ]);
    }

    public function fields(Request $request)
    {
        return array_filter([
            Markdown::make('Content')->required(),

            MorphTo::make('Noteable')->types([
                nova('user'),
                nova('contact'),
                nova('customer'),
                nova('order'),
                nova('booking'),
                nova('game'),
                nova('block'),
                nova('slot'),
            ]),

            new Panel('Data Fields', $this->dataFields()),

        ]);
    }

    protected function dataFields(): array
    {
        return array_merge(
            parent::dataFields(),
            $this->creatorDataFields(),
            [
                DateTime::make('Updated At')->exceptOnForms(),
            ],
        );
    }
}
