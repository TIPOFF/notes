<?php

namespace Tipoff\Notes\Models;

use Tipoff\Support\Models\BaseModel;
use Tipoff\Support\Traits\HasPackageFactory;

class Note extends BaseModel
{
    use HasPackageFactory;

    protected $guarded = ['id'];
    protected $casts = [];

    public function noteable()
    {
        return $this->morphTo();
    }

    public function creator()
    {
        return $this->belongsTo(config('tipoff.model_class.user'), 'creator_id');
    }
}
