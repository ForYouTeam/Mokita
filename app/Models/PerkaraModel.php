<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerkaraModel extends Model
{
    use HasFactory;
    protected $table = 'perkara';
    protected $fillable = [
        'id_hakim', 'nama_pengacara', 'nama_penitra', 'id_gugatan',
        'status', 'id_jadwal_sidang',
        'created_at', 'updated_at'
    ];

    public function hakimRole() {
        return $this->belongsTo(HakimModel::class, 'id_hakim');
    }

    public function jadwalSidang() {
        return $this->belongsTo(JadwalSidangModel::class, 'id_jadwal_sidang');
    }
}
