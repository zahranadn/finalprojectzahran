<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPendakianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_pendakian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('destinasi_detail_id');
            $table->date('tanggal_pendakian');
            $table->integer('kuota_pendakian');
            $table->integer('terdaftar');
            $table->integer('biaya');
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
        Schema::dropIfExists('jadwal_pendakian');
    }
}
