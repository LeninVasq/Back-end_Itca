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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('id_usuario'); 
            $table->foreign('id_tipo_usuario') 
                ->references('id')          
                ->on('tipos_usuario')       
                ->onDelete('cascade'); 
            $table->string('correo')->unique();
            $table->string('clave');
            $table->string('token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('fecha_registro')->useCurrent(); 
            $table->longText('img')->nullable();
            $table->boolean('estado')->default(true); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
