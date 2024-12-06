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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemain');
            $table->unsignedBigInteger('id_tim_asal');
            $table->unsignedBigInteger('id_tim_tujuan');
            $table->date('tanggal_transfer');
            $table->decimal('biaya_transfer', 15, 2);
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
        Schema::dropIfExists('transfers');
    }
};
