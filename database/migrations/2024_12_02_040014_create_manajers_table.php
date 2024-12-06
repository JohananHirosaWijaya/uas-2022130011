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
        Schema::create('manajers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('id_tim')->constrained('tims')->onDelete('cascade'); // Relasi dengan Tim
            $table->integer('umur');
            $table->integer('pengalaman'); // Pengalaman dalam tahun
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manajers');
    }
};
