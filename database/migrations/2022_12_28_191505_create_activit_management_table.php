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
        Schema::create('activit_management', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('desc')->nullable();
            $table->string('address')->nullable();
            $table->integer('tel')->nullable();
            $table->integer('whatsapp')->nullable();
            $table->float('minimum_order')->nullable();
            $table->float('prepar_order_time')->nullable();
            $table->float('order_time')->nullable();
            $table->string('logo')->nullable();
            $table->string('background')->nullable();
            $table->integer('receipt_from_place')->nullable();
            $table->integer('delivery')->nullable();
            $table->integer('free_delivery')->nullable();
            $table->integer('disable_request')->nullable();
            $table->integer('disable_connection_to_waiter')->nullable();
            $table->integer('disable_follow_order')->nullable();
            $table->integer('eat_on_spot')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activit_management');
    }
};
