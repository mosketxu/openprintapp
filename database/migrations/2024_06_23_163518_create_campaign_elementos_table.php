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
        Schema::create('campaign_elementos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained('campaigns')->onDelete('cascade');
            $table->string('imagen')->nullable();
            $table->string('campo1')->nullable();
            $table->string('campo2')->nullable();
            $table->string('campo3')->nullable();
            $table->string('campo4')->nullable();
            $table->string('campo5')->nullable();
            $table->string('categoria')->nullable();
            $table->string('archivo')->nullable();
            $table->string('material')->nullable();
            $table->string('medida')->nullable();
            $table->string('idioma')->nullable();
            $table->string('elementificador')->nullable()->index();
            $table->bigInteger('producto_id')->nullable();
            $table->double('preciocoste_ud', 15, 2)->default(0.00);
            $table->string('imagenelemento')->default('pordefecto.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_elementos');
    }
};
