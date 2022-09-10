<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAnakModel extends Model
{
    use HasFactory;
    protected $table = 'detail_anak';
    protected $fillable = [
        'id', 'hak_asuh',
        'created_at', 'updated_at'
    ];
}
