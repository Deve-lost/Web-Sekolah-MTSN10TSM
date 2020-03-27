<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimoniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimoni_alumni', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('lulusan');
            $table->string('caption');
            $table->string('status')->nullable();
            $table->string('avatar');
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
        Schema::dropIfExists('testimoni_alumni');
    }
}
