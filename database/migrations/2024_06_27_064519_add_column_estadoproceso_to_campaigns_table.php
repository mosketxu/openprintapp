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
        Schema::table('campaigns', function (Blueprint $table) {
            $table->integer('estadoproceso')->after('estado')->default('0');
            $table->integer('numcolumnas')->after('estadoproceso')->default('0');
            $table->integer('filacod')->after('numcolumnas')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropColumn('estadoproceso');
            $table->dropColumn('numcolumnas');
            $table->dropColumn('filacod');
        });
    }
};
