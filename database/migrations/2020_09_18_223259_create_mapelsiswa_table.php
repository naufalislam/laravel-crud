<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelsiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapelsiswa', function (Blueprint $table) {
            $table->string('kode');
            $table->string('nama');
            $table->string('semester');
            $table->string('nilai');
            $table->timestamps();
        });
        Schema::update('mapelsiswa',function (Blueprint $table)
        {
            $table->string('kode');
            $table->string('nama');
            $table->string('namane');
            $table->string('semester');
            $table->string('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapelsiswa');
    }
}
