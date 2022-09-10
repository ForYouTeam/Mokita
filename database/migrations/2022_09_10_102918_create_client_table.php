<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('nama');
            $table->string('marga');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('client');
    }
}
