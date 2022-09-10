<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGugatanTable extends Migration
{
    public function up()
    {
        Schema::create('gugatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penggugat')->constrained('client');
            $table->foreignId('id_tergugat')->constrained('client');
            $table->date('tgl_pernikahan');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('no_akta_nikah');
            $table->text('tinggal_1');
            $table->text('tinggal_2');
            $table->foreignId('id_anak')->constrained('anak');
            $table->date('tgl_tidak_rukun');
            $table->text('penyebab');
            $table->date('puncak_konflik');
            $table->string('lama_pisah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gugatan');
    }
}
