<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJamMasukToAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absensi', function (Blueprint $table) {
            // TODO Dewi: Tambahkan kolom untuk tanggal
            $table->string('tanggal');
            $table->string('jam_masuk')->nullable();
            // TODO Dewi: Tambahkan kolom untuk jam_keluar
            $table->string('jam_keluar')->nullable();
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
            // TODO Dewi: Tambahkan dropColumn untuk tanggal
            $table->dropColumn('tanggal');
            $table->dropColumn('jam_masuk');
            // TODO Dewi: Tambahkan dropColumn untuk jam_keluar
            $table->dropColumn('jam_keluar');
            // TODO Dewi: jalankan php artisan migrate jika sudah semua disini.
        });
    }
}
