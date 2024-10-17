<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('places', function (Blueprint $table){
            $table->string('name');
            $table->string('description');
            $table->string('address');
            $table->integer('postcode');
            $table->string('city');
            $table->string('province');
            $table->double('latitude', 8, 3);
            $table->double('longtitude', 8, 3);
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('places', function (Blueprint $table){
            $table->dropColumn(['name', 'description', 'address', 'postcode', 'city', 'province','latitude', 'longtitude', 'images']);
        });
    }
};
