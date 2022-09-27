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
        Schema::create('phrases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phrase_category_id');
            $table->text('phrase_name');
            $table->text('phrase_meaning');
            $table->longText('phrase_image')->nullable();
            $table->longText('phrase_pronunciation_audio_m');
            $table->longText('phrase_pronunciation_audio_f');

            $table->foreign('phrase_category_id')->references('id')->on('phrase_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phrases');
    }
};
