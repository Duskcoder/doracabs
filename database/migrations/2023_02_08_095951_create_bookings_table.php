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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('from_place')->nullable();
            $table->string('to_place')->nullable();
            $table->integer('car_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('oneway_round')->nullable();
            $table->double('charge_per_km', 8, 2)->nullable();
            $table->double('distance', 8, 2)->nullable();
            $table->double('amount', 8, 2)->nullable();
            $table->dateTime('depart_date_time')->nullable();
            $table->string('cust_name')->nullable();
            $table->string('cust_email')->nullable();
            $table->string('cust_mbl')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
