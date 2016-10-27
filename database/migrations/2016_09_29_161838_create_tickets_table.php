<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('titulo', 200);
            $table->text('detalle');
            $table->enum('estado', ['Pendiente', 'Abierto', 'Vencido', 'Cerrado']);
            $table->dateTime('vencimiento');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('ticket_categories_id')->unsigned();
            $table->foreign('ticket_categories_id')->references('id')->on('ticket_categories')->onDelete('cascade');

            $table->integer('ticket_priorities_id')->unsigned();
            $table->foreign('ticket_priorities_id')->references('id')->on('ticket_priorities')->onDelete('cascade');

            $table->integer('device_id')->unsigned();
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
