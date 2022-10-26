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
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phrase_category_id');
            $table->unsignedBigInteger('answer1');
            $table->unsignedBigInteger('answer2');
            $table->unsignedBigInteger('answer3');
            $table->unsignedBigInteger('question');
            $table->enum('correct_answer',['answer1','answer2','answer3']);
            $table->timestamps();

            $table->foreign('phrase_category_id')->references('id')->on('phrase_categories')->onDelete('cascade');
            $table->foreign('answer1')->references('id')->on('phrases')->onDelete('cascade');
            $table->foreign('answer2')->references('id')->on('phrases')->onDelete('cascade');
            $table->foreign('answer3')->references('id')->on('phrases')->onDelete('cascade');
            $table->foreign('question')->references('id')->on('phrases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_questions');
    }
};
