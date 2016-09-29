<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('nombre');
            $table->string('apellido');

            $table->enum('perfil',['usuario','tecnico','externo']);
            $table->string('usuario')->unique();
            $table->string('dominio')->nullable();
            $table->enum('locacion',['Predio','Leales','Independencia','Cooperativa','Cachi']);

            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}