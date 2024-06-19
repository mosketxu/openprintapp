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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entidad_id')->constrained('entidades');
            $table->string('name', 100)->unique('campaigns_name_unique');
            $table->date('fechainicio');
            $table->date('fechafin');
            $table->integer('estado')->default('0');
            $table->date('fechainstal1')->nullable();
            $table->date('fechainstal2')->nullable();
            $table->date('fechainstal3')->nullable();
            $table->string('montaje1')->nullable();
            $table->string('montaje2')->nullable();
            $table->string('montaje3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
