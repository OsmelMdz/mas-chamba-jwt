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
        Schema::create('prestador_servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('a_paterno');
            $table->string('a_materno');
            $table->date('fecha_nacimiento');
            $table->string('imagen');
            $table->enum('sexo', ['Hombre', 'Mujer', 'Prefiero no decir']);
            $table->string('telefono', 10);
            $table->string('identificacion_personal'); //cambié el nombre del campo
            $table->string('comprovante_domicilio'); //cambié el nombre del campo
            $table->string('email')->unique();
            $table->enum('status',['premium','normal']); //cambiar es estado de cuenta del prestador de servicio si es premium o normal
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->unsignedBigInteger('id_cursos');
            $table->foreign('id_cursos')->references('id')->on('cursos');
            $table->unsignedBigInteger('id_servicios');
            $table->foreign('id_servicios')->references('id')->on('servicios');
            $table->unsignedBigInteger('id_certificaciones');
            $table->foreign('id_certificaciones')->references('id')->on('certificaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestador_servicios');
    }
};
