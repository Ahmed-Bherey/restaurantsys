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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderTotal_id')->nullable();
            $table->string('img')->nullable();
            $table->string('name')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamps();
            $table->foreign('orderTotal_id')->references('id')->on('order_totals')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
