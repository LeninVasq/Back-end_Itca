<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('id_reservas'); // Crea la columna id_reservas como llave primaria
            $table->unsignedBigInteger('id_usuario'); // Columna id_usuario como FK
            $table->dateTime('fecha_entrega'); // Columna fecha_entrega
            $table->dateTime('fecha_reserva'); // Columna fecha_reserva
            $table->unsignedBigInteger('id_reserva_item'); // Columna id_reserva_item como FK
            $table->boolean('estado'); // Columna estado (activo o inactivo)
            $table->timestamps(); // Crea las columnas created_at y updated_at

            // Definición de claves foráneas
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_reserva_item')->references('id')->on('reserva_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
