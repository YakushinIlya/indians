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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("seo_title")->nullable();
            $table->string("seo_description")->nullable();
            $table->string("seo_keywords")->nullable();
            $table->json("images")->nullable();
            $table->string("title")->nullable();
            $table->string("article")->nullable();
            $table->integer("count")->nullable();
            $table->json("options")->nullable();
            $table->float("price")->nullable();
            $table->text("desc")->nullable();
            $table->integer("sbis_id")->nullable();
            $table->integer("hierarchicalId")->nullable();
            $table->integer("hierarchicalParent")->nullable();
            $table->string("externalId")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
