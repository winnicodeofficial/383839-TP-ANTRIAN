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
        Schema::create('data_dianogsas', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm');
            $table->string('nama');
            $table->string('dianogsa');
            $table->date('tanggal_periksa');
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
        Schema::dropIfExists('data_dianogsas');
    }
};
