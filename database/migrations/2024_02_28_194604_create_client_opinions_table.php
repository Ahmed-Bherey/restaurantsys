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
        Schema::create('client_opinions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clicnt_id')->nullable();
            $table->longText('opinion')->nullable();
            $table->timestamps();
            $table->foreign('clicnt_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_opinions');
    }
};
