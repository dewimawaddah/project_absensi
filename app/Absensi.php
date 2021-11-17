<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $fillable = ['id', 'nik_pegawai', 'full_name_pegawai', 'created_at', 'updated_at', 'tanggal', 'jam_masuk', 'jam_keluar'];
}
