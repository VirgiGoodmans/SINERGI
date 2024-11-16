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
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->decimal('total_harga', 10, 2)->nullable()->after('dp'); // Untuk menyimpan total harga
            $table->integer('jumlah_peserta')->nullable()->after('total_harga'); // Untuk jumlah peserta
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->dropColumn(['total_harga', 'jumlah_peserta']);
        });
    }
};
