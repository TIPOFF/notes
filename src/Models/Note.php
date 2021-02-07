<?php

namespace Tipoff\Notes\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tipoff\Support\Models\BaseModel;

class Note extends BaseModel
{
    use HasFactory;

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
