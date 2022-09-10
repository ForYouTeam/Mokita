<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HakimModel extends Model
{
    use HasFactory;
    protected $table = 'hakim';
    protected $fillable = [
        'id', 'nama', 'nip', 'tempat_lahir', 'tgl_lahir', 'jabatan',
        'pendidikan_s1', 'pendidikan_s2', 'pendidikan_s3', 'sertifikat_mediator',
        'created_at', 'updated_at'
    ];
}
