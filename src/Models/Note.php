<?php

declare(strict_types=1);

namespace Tipoff\Notes\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tipoff\Authorization\Models\User;
use Tipoff\Support\Models\BaseModel;
use Tipoff\Support\Traits\HasCreator;
use Tipoff\Support\Traits\HasPackageFactory;
use Tipoff\Support\Traits\HasUpdater;

/**
 * @property int id
 * @property Model noteable
 * @property string|null content
 * @property User creator
 * @property User updater
 * @property Carbon deleted_at
 * @property Carbon created_at
 * @property Carbon update_at
 * // Raw relations
 * @property int noteable_id
 * @property string noteable_type
 * @property int creator_id
 * @property int updater_id
 */
class Note extends BaseModel
{
    use HasPackageFactory;
    use HasCreator;
    use HasUpdater;
    use SoftDeletes;

    protected $casts = [];

    public function noteable()
    {
        return $this->morphTo();
    }
}
