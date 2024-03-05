<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kunjungs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->string('no_daftar');
            $table->date('tanggal_daftar');
            $table->bigInteger('poli_id')->unsigned();
            $table->string('dianogsa');
            $table->timestamps();

            // Relation Tables
            $table->foreign('poli_id')->references('id')->on('data_polis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_kunjungs');
    }
};
