<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('time_id')->nullable();
            $table->unsignedBigInteger('difficulty_id')->nullable();
            $table->unsignedBigInteger('persons_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->string('recipe_photo_path', 2048)->nullable();
            $table->timestamps();

            $table->foreign('time_id')->references('id')->on('time')->onDelete('set null');
            $table->foreign('difficulty_id')->references('id')->on('difficulty')->onDelete('set null');
            $table->foreign('persons_id')->references('id')->on('persons')->onDelete('set null');
            $table->foreign('type_id')->references('id')->on('type')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
