<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHakimTable extends Migration
{
    public function up()
    {
        Schema::create('hakim', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jabatan');
            $table->text('pendidikan_s1');
            $table->text('pendidikan_s2')->nullable();
            $table->text('pendidikan_s3')->nullable();
            $table->string('sertifikat_mediator');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hakim');
    }
}
