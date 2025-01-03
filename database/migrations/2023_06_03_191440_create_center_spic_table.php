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
        Schema::create('center_spic', function (Blueprint $table) {
            $table->id();
            $table->foreignId('center_id')->constrained('centers');
            $table->foreignId('spicialization_id')->constrained('spicializations');
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
        Schema::dropIfExists('center_spic');
    }
};
