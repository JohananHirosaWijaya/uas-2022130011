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
        Schema::create('pemains', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemain');
            $table->foreignId('id_tim')->constrained('tims')->onDelete('cascade'); // Relasi dengan Tim
            $table->string('posisi');
            $table->integer('umur');
            $table->string('kebangsaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemains');
    }
};
