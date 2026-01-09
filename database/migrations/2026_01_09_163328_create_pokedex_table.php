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
        // สร้างตารางชื่อ 'pokedexs'
        Schema::create('pokedexs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('species')->nullable(); // อนุญาตให้ว่างได้
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->double('hp')->nullable();
            $table->double('attack')->nullable();
            $table->double('defense')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokedexs');
    }
};