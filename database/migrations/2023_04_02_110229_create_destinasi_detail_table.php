<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinasiDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinasi_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namagunung');
            $table->string('slug');
            $table->string('location');
            $table->longText('tentang_gunung');
            $table->date('tanggal_pendakian');
            $table->integer('kuota_pendakian');
            $table->integer('terdaftar');
            $table->integer('Biaya');
            $table->softDeletes();
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
        Schema::dropIfExists('destinasi_detail');
    }
}
