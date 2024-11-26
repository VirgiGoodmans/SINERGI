<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuBumdesTable extends Migration
{
    public function up()
    {
        Schema::create('menu_bumdes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 10, 2);
            $table->enum('tipe', ['makanan', 'paket makanan', 'paket nasi', 'menu rekomendasi', 'minuman', 'minuman porong', 'snack']);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('menu_bumdes');
    }
}
