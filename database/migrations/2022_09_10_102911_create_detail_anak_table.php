<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAnakTable extends Migration
{
    public function up()
    {
        Schema::create('detail_anak', function (Blueprint $table) {
            $table->id();
            $table->string('hak_asuh');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_anak');
    }
}
