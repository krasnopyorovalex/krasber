<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_services', function (Blueprint $table) {
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('service_relative_id');

            $table->primary(['service_id', 'service_relative_id']);

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('service_relative_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('related_services');
    }
}
