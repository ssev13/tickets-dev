<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('titulo',200);
            $table->text('detalle');
            $table->enum('estado',['Pendiente','Abierto','Vencido','Cerrado']);

            $table->integer('user_id')->unsigned();
            $table->foreing('user_id')->references('id')->on('users');

            $table->integer('category_id')->unsigned();
            $table->foreing('category_id')->references('id')->on('categories');

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
        Schema::dropIfExists('tickets');
    }
}
