<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('documento');
            $table->string('nombres', 30);
            $table->string('apellidos', 30);
            $table->bigInteger('telefono');
            $table->string('lat', 30);
            $table->string('lng', 30);
            $table->foreignId('rutas_id')
                ->references('id')
                ->on('rutas')
                ->onDelete('cascade');
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
        Schema::dropIfExists('clientes');
    }
};
