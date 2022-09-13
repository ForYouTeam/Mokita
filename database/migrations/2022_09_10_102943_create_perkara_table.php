<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerkaraTable extends Migration
{
    public function up()
    {
        Schema::create('perkara', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_hakim')->constrained('hakim');
            $table->string('nama_pengacara');
            $table->string('nama_penitra');
            $table->foreignId('id_gugatan')->constrained('gugatan');
            $table->string('status');
            $table->foreignId('id_jadwal_sidang')->constrained('jadwal_sidang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perkara');
    }
}
