<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode_dokter');
            $table->string('nama');
            $table->string('spesialis');
            $table->string('alamat');
            $table->string('telepon');
            $table->integer('poliklinik_id')->unsigned();
            $table->string('tarif');
        });

        Schema::create('poliklinik', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
        });

        Schema::create('pasien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('gender');
            $table->string('umur');
            $table->string('telepon');
        });

        Schema::create('resep', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dokter_id')->unsigned();
            $table->integer('pasien_id')->unsigned();
            $table->integer('poliklinik_id')->unsigned();
            $table->date('tgl');
            $table->string('total_harga');
            $table->string('bayar');
            $table->string('kembali');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokter');
        Schema::dropIfExists('poliklinik');
        Schema::dropIfExists('pasien');
        Schema::dropIfExists('resep');
    }
}
