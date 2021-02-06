<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $userModel = config('tipoff.model_class.user');
            $userTable = (new $userModel)->getTable();

            $table->id();
            $table->unsignedBigInteger('noteable_id')->index();
            $table->string('noteable_type')->index();
            $table->text('content')->nullable(); // Will be written in Markdown.
            $table->foreignId('creator_id')->references('id')->on($userTable);
            $table->foreignId('updater_id')->references('id')->on($userTable);
            $table->softDeletes();
            $table->timestamps();
        });
    }
}
