<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipoUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_usuario', function (Blueprint $table) {
            $table->id('id_tipo_usuario'); // Crea la columna id_tipo_usuario como llave primaria
            $table->unsignedBigInteger('id_usuario'); // Columna id_usuario como FK
            $table->string('tipo'); // Columna tipo
            $table->boolean('estado'); // Columna estado
            $table->timestamps(); // Columna de timestamps (created_at, updated_at)

            // Definir la clave foránea
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_usuario');
    }
}
