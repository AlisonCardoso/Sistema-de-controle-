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
            $table->foreignId('RegionalConmand_id')->constrained();
            $table->foreignId('SubCommand_id')->constrained();
            $table->string('brand'); //marca
            $table->string('model');//modelo
            $table->string('prefix')->unique();//prefixo
            $table->boolean('characterized')->default(true);// caracterizada
            $table->boolean('is_patrimony')->default(true);// patrimoniada ou locada
            $table->boolean('is_active')->default(true);
            $table->string('plate')->unique(); //placa
            $table->year('year'); //preco fipe
            $table->decimal('price', 8, 2);
            $table->string('type'); //tipo
            $table->string('photo'); //foto
            $table->string('status'); //tipo\

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
