<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_usuario'); // ID de usuario como clave primaria
            $table->string('nombre_usuario'); // Nombre del usuario
            $table->string('correo')->unique(); // Correo electrónico (único)
            $table->string('clave'); // Clave de acceso
            $table->string('token')->nullable(); // Token, puede ser nulo
            $table->timestamp('fecha_registro')->useCurrent(); // Fecha de registro
            $table->longText('img')->nullable(); // Imagen del usuario, puede ser nula
            $table->boolean('estado')->default(true); // Estado del usuario (activo o inactivo)
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
