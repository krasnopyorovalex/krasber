<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoPositionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_position_items', static function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seo_position_id');
            $table->string('query', 255);
            $table->unsignedTinyInteger('value')->default(1);
            $table->enum('se',['yandex','google'])->default('yandex');
            $table->unsignedTinyInteger('pos')->default(0);

            $table->foreign('seo_position_id')->references('id')->on('seo_positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_position_items');
    }
}
