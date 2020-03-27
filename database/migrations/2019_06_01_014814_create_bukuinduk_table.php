<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuindukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_induk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nis');
            $table->string('nama_lengkap');
            $table->string('ttl');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('avatar')->nullable();
            $table->text('alamat');
            $table->integer('anak_ke');
            $table->string('nama_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('nama_ibu');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->text('alamat_orang_tua');
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
        Schema::dropIfExists('buku_iduk');
    }
}
