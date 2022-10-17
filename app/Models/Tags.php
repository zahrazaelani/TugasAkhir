<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tags extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'tags',
        'slug',
    ];

    protected $hidden = [
        
    ];
}
