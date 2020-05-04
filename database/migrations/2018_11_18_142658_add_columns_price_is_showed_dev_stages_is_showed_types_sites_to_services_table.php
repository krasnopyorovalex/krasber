<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsPriceIsShowedDevStagesIsShowedTypesSitesToServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedMediumInteger('price')->default(0)->after('parent_id');
            $table->enum('is_showed_dev_stages', [0,1])->default(0)->after('is_published');
            $table->enum('is_showed_type_sites', [0,1])->default(0)->after('is_showed_dev_stages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['price','is_showed_dev_stages','is_showed_type_sites']);
        });
    }
}
