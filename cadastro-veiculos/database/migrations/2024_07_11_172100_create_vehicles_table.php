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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('sub_command_id')->constrained();
            $table->string('brand'); //marca
            $table->string('model');//modelo
            $table->string('prefix')->unique()->nullable();//prefixo
            $table->string('patrimonio')->unique()->nullable();//patrimonio
            $table->boolean('characterized')->default(true);// caracterizada
            $table->boolean('is_active')->default(true);
            $table->boolean('is_locade')->default(true);
            $table->string('plate')->unique(); //placa
            $table->year('year'); // ano
            $table->decimal('price', 8, 2)->nullable();//preco fipe
            $table->string('type'); //tipo
            $table->string('photo')->nullable(); //foto
            $table->string('hodometro')->nullable(); //hodometro


            $table->timestamps();







        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');

    }


};
