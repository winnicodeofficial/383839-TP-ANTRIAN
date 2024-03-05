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
        Schema::create('data_jadwalprakteks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dokter_id')->unsigned();
            $table->bigInteger('poli_id')->unsigned();
            $table->string('jadwal_praktek');
            $table->string('hari_oper');
            $table->timestamps();

            // Relation Tables
            $table->foreign('poli_id')->references('id')->on('data_polis')->onDelete('cascade');
            $table->foreign('dokter_id')->references('id')->on('data_dokters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_jadwalprakteks');
    }
};
