<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('campaign_elemento_store', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id');
            $table->unsignedBigInteger('campaign_elemento_id');
            $table->unsignedBigInteger('campaign_store_id');
            $table->integer('cantidad'); // Campo para almacenar la cantidad de elementos por tienda en la campaña
            $table->timestamps();

            // Claves foráneas
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            $table->foreign('campaign_elemento_id')->references('id')->on('campaign_elementos')->onDelete('cascade');
            $table->foreign('campaign_store_id')->references('id')->on('campaign_stores')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('campaign_elemento_store');
    }
};
