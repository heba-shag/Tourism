<?php

use App\Models\Center;
use App\Models\User;
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
        Schema::create('rate_centers', function (Blueprint $table) {
            $table->id();
            $table->integer('star_rating');
            $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate();;
            $table->foreignIdFor(Center::class)->constrained()->cascadeOnUpdate();;
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
        Schema::dropIfExists('rate_centers');
    }
};
