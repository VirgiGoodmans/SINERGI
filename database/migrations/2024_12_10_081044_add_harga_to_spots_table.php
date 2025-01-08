<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHargaToSpotsTable extends Migration
{
    public function up()
    {
        Schema::table('spot', function (Blueprint $table) {
            $table->integer('harga')->nullable()->after('status'); // Kolom harga
        });
    }

    public function down()
    {
        Schema::table('spot', function (Blueprint $table) {
            $table->dropColumn('harga');
        });
    }
}
