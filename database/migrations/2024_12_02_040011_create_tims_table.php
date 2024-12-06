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
        Schema::create('tims', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tim')->unique();
            $table->unsignedBigInteger('id_liga'); // Kolom untuk foreign key
            $table->string('kota');
            $table->integer('tahun_berdiri');
            $table->timestamps();

            // Menambahkan foreign key secara manual
            $table->foreign('id_liga')->references('id')->on('ligas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tims');
    }
};
