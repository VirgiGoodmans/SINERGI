<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pemesanan_paket_tambahan', function (Blueprint $table) {
            $table->id();
            // Menentukan foreign key dengan tipe data unsignedBigInteger jika kolom di tabel referensi menggunakan tipe ini
            $table->unsignedBigInteger('pemesanan_id');
            $table->unsignedBigInteger('paket_tambahan_id');

            // Menambahkan foreign key constraints setelah mendefinisikan kolom
            $table->foreign('pemesanan_id')->references('id')->on('pemesanan')->onDelete('cascade');
            $table->foreign('paket_tambahan_id')->references('id')->on('paket_tambahan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_paket_tambahan');
    }
};
