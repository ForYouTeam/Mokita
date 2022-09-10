<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GugatanModel extends Model
{
    use HasFactory;
    protected $table = 'gugatan';
    protected $fillable = [
        'id', 'id_penggugat', 'id_tergugat', 'tgl_pernikahan', 'kecamatan',
        'kabupaten', 'no_akta_nikah', 'tinggal_1', 'tinggal_2', 'id_anak',
        'tgl_tidak_rukun', 'penyebab', 'puncak_konflik', 'lama_pisah',
        'created_at', 'updated_at'
    ];
}
