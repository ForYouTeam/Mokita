<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakModel extends Model
{
    use HasFactory;
    protected $table = 'anak';
    protected $fillable = [
        'id', 'id_detail_anak', 'nama', 'tempat_lahir', 'tgl_lahir',
        'created_at', 'updated_at'
    ];

    public function DetailAnakRole()
    {
        return $this->belongsTo(DetailAnakModel::class, 'id_detail_anak');
    }
}
