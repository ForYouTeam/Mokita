<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    use HasFactory;
    protected $table = 'client';
    protected $fillable = [
        'id', 'status', 'nama', 'marga', 'tempat_lahir', 'tgl_lahir', 'agama',
        'pekerjaan', 'alamat', 'kelurahan', 'kecamatan', 'kabupaten',
        'created_at', 'updated_at'
    ];
}
