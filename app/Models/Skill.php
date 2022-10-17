<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'jenis',
        'lembaga',
        'tanggal',
        'tanggal_expired',
        'no_sertifikat',
        'users_id',
        'path_url_photo'
    ];

    protected $hidden = [

    ];
    
    public function user()//satu user satu foto (buat tau produk itu yang punya siapa/user yang bikin)
    {
        return $this->hasOne(User::class, 'id', 'users_id');//id=relasi users_id=foreignkey
    }
}
