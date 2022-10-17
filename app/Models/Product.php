<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
//field apa saja yang akan disimpan menggunakan mass assignment
    protected $fillable = [ 
        'name',
        'users_id',
        'categories_id',
        'price',
        'description',
        'slug',
        'stock',
        'weight',
        'tags',
    ];

    protected $hidden = [

    ];

    public function galleries()//satu produk banyak galeri (buat tau produk itu fotonya apa aja)
    {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    public function user()//satu user banyak galeri (buat tau produk itu yang punya siapa/user yang bikin)
    {
        return $this->hasOne(User::class, 'id', 'users_id');//id=relasi users_id=foreignkey
    }

    public function category() //pengen tau produk itu masuk kategori mana
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id'); //kategori cuma satu tiap produk, karena fk direlasiin ke pk
    }
    public function tags() //pengen tau produk itu masuk kategori mana
    {
        return $this->belongsTo(Tags::class, 'tags', 'id'); //kategori cuma satu tiap produk, karena fk direlasiin ke pk
    }
     public function transactiondetail()
    {
        return $this->hasMany(TransactionDetail::class, 'products_id', 'id');
    }
    // public function count_product(){
    // return $this->transactiondetail()->count();
    // }
}
