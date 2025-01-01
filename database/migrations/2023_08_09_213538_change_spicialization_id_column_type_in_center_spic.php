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
        Schema::table('center_spic', function (Blueprint $table) {
            $table->dropForeign('center_spic_spicialization_id_foreign');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('center_spic', function (Blueprint $table) {
            $table->integer('spicialization_id')->change();
        });
    }
};
