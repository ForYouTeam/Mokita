<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSidangModel extends Model
{
    use HasFactory;
    protected $table = 'jadwal_sidang';
    protected $fillable = [
        'id', 'tgl_waktu_mulai', 'tgl_waktu_akhir', 'keterangan',
        'created_at', 'updated_at'
    ];
}
