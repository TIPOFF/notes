<?php

namespace Tipoff\Notes\Models;

use Tipoff\Support\Models\BaseModel;
use Tipoff\Support\Traits\HasCreator;
use Tipoff\Support\Traits\HasPackageFactory;

class Note extends BaseModel
{
    use HasPackageFactory;
    use HasCreator;

    protected $casts = [];

    public function noteable()
    {
        return $this->morphTo();
    }
}
