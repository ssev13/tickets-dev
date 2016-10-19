<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ticket_categories', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre', 100);
            $table->text('detalle');
            $table->enum('estado', ['Activo', 'Inactivo']);

            $table->integer('ticket_priorities_id')->unsigned();
            $table->foreign('ticket_priorities_id')->references('id')->on('ticket_priorities')->onDelete('cascade');

            $table->integer('parent_id')->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('ticket_categories');
    }
}
