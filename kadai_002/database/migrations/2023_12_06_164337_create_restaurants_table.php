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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('category_id')->unsigned();

            $table->string('image');
            $table->string('discription');
            $table->integer('priceupper')->unsigned();
            $table->integer('pricelower')->unsigned();
            $table->string('time');
            $table->string('holiday');
            $table->string('postcode');
            $table->string('address');
            $table->string('telephone');
            $table->string('payment');

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
        Schema::dropIfExists('restaurants');
    }
};
