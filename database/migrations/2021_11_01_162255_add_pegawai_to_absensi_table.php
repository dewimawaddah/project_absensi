<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPegawaiToAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absensi', function (Blueprint $table) {
            $table->unsignedBigInteger('nik_pegawai');
            $table->foreign('nik_pegawai')->references('id')->on('pegawai')->onDelete('cascade');
            $table->unsignedBigInteger('full_name_pegawai');
            $table->foreign('full_name_pegawai')->references('id')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absensi', function (Blueprint $table) {
            $table->dropForeign(['nik_pegawai']);
            $table->dropColumn('nik_pegawai');
            $table->dropForeign(['full_name_pegawai']);
            $table->dropColumn('full_name_pegawai');
        });
    }
}
