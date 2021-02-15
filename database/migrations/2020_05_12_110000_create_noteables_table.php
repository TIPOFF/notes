<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteablesTable extends Migration
{
    public function up()
    {
        Schema::create('noteables', function (Blueprint $table) {
            $table->foreignIdFor(app('note'))->index();
            $table->morphs('noteable');
            $table->timestamps();
            
            $table->unique(['note_id', 'noteable_id', 'noteable_type']);
        });
    }
}
