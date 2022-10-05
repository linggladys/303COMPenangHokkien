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
        Schema::create('mem_aids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phrase_id');
            $table->unsignedBigInteger('user_id');
            $table->text('memory_aid_content');
            $table->timestamps();

            $table->foreign('phrase_id')->references('id')->on('phrases')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mem_aids');
    }
};
