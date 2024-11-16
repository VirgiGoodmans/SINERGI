<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDpTambahanFasilitasToPemesananTable extends Migration
{
    public function up()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->integer('dp')->nullable();
            $table->boolean('sound_system')->default(false);
            $table->boolean('tikar')->default(false);
        });
    }

    public function down()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->dropColumn(['dp', 'sound_system', 'tikar']);
        });
    }
}
