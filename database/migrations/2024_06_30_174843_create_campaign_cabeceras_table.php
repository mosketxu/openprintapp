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
        Schema::create('campaign_cabeceras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained('campaigns')->onDelete('cascade');
            $table->string('campo0')->nullable()->default('Imagen');
            $table->string('campo1')->nullable()->default('Campo1');
            $table->string('campo2')->nullable()->default('Campo2');
            $table->string('campo3')->nullable()->default('Campo3');
            $table->string('campo4')->nullable()->default('Campo4');
            $table->string('campo5')->nullable()->default('Campo5');
            $table->string('campo6')->nullable()->default('Categoria');
            $table->string('campo7')->nullable()->default('Archivo');
            $table->string('campo8')->nullable()->default('Material');
            $table->string('campo9')->nullable()->default('Medida');
            $table->string('campo10')->nullable()->default('Idioma');
            $table->string('elementificador')->nullable()->default('Elementificador');
            $table->string('producto_id')->nullable()->default('Producto');
            $table->string('preciocoste_ud')->default('Precio');
            $table->string('imagenelemento')->default('Imagen');
            $table->boolean('bcampo0')->default(true);
            $table->boolean('bcampo1')->default(true);
            $table->boolean('bcampo2')->default(true);
            $table->boolean('bcampo3')->default(true);
            $table->boolean('bcampo4')->default(true);
            $table->boolean('bcampo5')->default(true);
            $table->boolean('bcampo6')->default(true);
            $table->boolean('bcampo7')->default(true);
            $table->boolean('bcampo8')->default(true);
            $table->boolean('bcampo9')->default(true);
            $table->boolean('bcampo10')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_cabeceras');
    }
};
