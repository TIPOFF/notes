<?php

namespace Tipoff\Notes\Models;

use Tipoff\Support\Models\BaseModel;
use Tipoff\Support\Traits\HasPackageFactory;
use Tipoff\Support\Traits\HasCreator;

class Note extends BaseModel
{
    use HasPackageFactory;
    use HasCreator;

    protected $guarded = ['id'];
    protected $casts = [];

    public function noteable()
    {
        return $this->morphTo();
    }
}
