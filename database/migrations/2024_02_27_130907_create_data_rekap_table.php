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
        Schema::create('data_rekaps', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm');
            $table->string('nama_pasien');
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->string('usia');
            $table->string('no_hp');
            $table->string('status_pasien');
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
        Schema::dropIfExists('data_rekaps');
    }
};
