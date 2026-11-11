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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            // $table->unsignedBigInteger('user_id'); // si se utiliza la funcion foreignId tambien crea la columna
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');//restriccion de llave foranea
            // $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade'); //realiza lo mismo que la linea anterior solo que funciona con convenciones 
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');//si se le pone set null, si se borra un usuario la tabla que este relacionada se considerara nulo, es necesario establecer que permite valores nulables
            $table->morphs('phoneable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
