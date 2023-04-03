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
        Schema::create('property_details', function (Blueprint $table) {
            $table->id();
            $table->string('state_id');
            $table->string('city_id');
            $table->string('property_type_id');
            $table->string('purchase_type_id');
            $table->string('user_id');
            $table->string('status_id');
            $table->string('price');
            $table->string('no_of_rooms');
            $table->string('no_of_bathrooms');
            $table->string('image');
            $table->string('video');
            $table->string('name');
            $table->text('land_mark');
            $table->string('like');
            $table->text('description');
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
        Schema::dropIfExists('property_details');
    }
};
