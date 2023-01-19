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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('orderHidden_id')->nullable();
            $table->unsignedBigInteger('table_id')->nullable();
            $table->unsignedBigInteger('delivery_id')->nullable();
            $table->integer('receive_way')->nullable();
            $table->string('receive_time')->nullable();
            $table->string('tel')->nullable();
            $table->string('address')->nullable();
            $table->string('img')->nullable();
            $table->string('name')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('orderHidden_id')->references('id')->on('order_hiddens')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('table_id')->references('id')->on('tables')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('delivery_id')->references('id')->on('deliveries')->onUpdate('cascade')->onDelete('cascade');
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
