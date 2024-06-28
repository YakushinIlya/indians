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
        Schema::create('news_rubrics', function (Blueprint $table) {
            $table->unsignedBigInteger('new_id');
            $table->unsignedBigInteger('rubric_id');
            $table->foreign('new_id')->references('id')->on('news')->onDelete('cascade');
            $table->foreign('rubric_id')->references('id')->on('rubrics')->onDelete('cascade');
            $table->primary(['new_id','rubric_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_rubrics');
    }
};
