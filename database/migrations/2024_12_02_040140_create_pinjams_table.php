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
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemain');
            $table->unsignedBigInteger('id_tim_asal');
            $table->unsignedBigInteger('id_tim_tujuan');
            $table->date('tanggal_pinjam');
            $table->integer('durasi_pinjam'); // Durasi pinjam dalam hari atau bulan
            $table->decimal('biaya_pinjam', 15, 2);
            $table->timestamps();

            $table->foreign('id_pemain')->references('id')->on('pemains')->onDelete('cascade');
            $table->foreign('id_tim_asal')->references('id')->on('tims')->onDelete('cascade');
            $table->foreign('id_tim_tujuan')->references('id')->on('tims')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjams');
    }
};
