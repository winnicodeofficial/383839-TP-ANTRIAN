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
        Schema::create('data_antrians', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_antrian')->unique();
            $table->bigInteger('poli_id')->unsigned();
            $table->bigInteger('dokter_id')->unsigned();
            $table->timestamps();

            // Relation Tables
            $table->foreign('poli_id')->references('id')->on('data_polis')->onDelete('cascade');
            // Relation Tables
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
        Schema::dropIfExists('data_antrians');
    }
};
