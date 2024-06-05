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
            $table->foreignId('user_id')->constrained()->onUpdate('cascade');
            $table->string('brand'); //marca
            $table->string('model');//modelo
            $table->string('prefix')->unique();//prefixo
            $table->boolean('characterized');// caracterizada
            $table->boolean('active')->default(true); // Campo ativa
            $table->string('plate')->unique(); //placa
            $table->year('year'); 
            $table->decimal('price', 8, 2);
            $table->enum('type', ['car', 'truck', 'motorcycle']);

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

    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
};
