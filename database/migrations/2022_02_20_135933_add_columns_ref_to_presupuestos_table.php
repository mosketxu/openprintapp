<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsRefToPresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presupuestos', function (Blueprint $table) {
            $table->string('refopenprint')->nullable()->after('fechapresupuesto');
            $table->string('refcliente')->nullable()->after('refopenprint');
            $table->foreignId('entidadcontacto_id')->nullable()->constrained('entidad_contactos')->after('prespuesto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presupuestos', function (Blueprint $table) {
            $table->dropColumn('refopenprint');
            $table->dropColumn('refcliente');
            $table->dropColumn('entidadcontacto_id');
        });
    }
}
