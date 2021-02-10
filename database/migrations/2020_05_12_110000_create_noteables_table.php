<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteablesTable extends Migration
{
    public function up()
    {
        Schema::create('noteables', function (Blueprint $table) {
            $table->foreignIdFor(app('note'))->index();
            $table->unsignedBigInteger('noteable_id')->index();
            $table->string('noteable_type')->index();
            $table->timestamps();
        });
    }
}
