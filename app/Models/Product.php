<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = ['kategori_id', 'nama', 'harga', 'harga_modal', 'stok', 'diskon', 'tipe_diskon', 'jenis'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    // public function tambah_cart($id){
    //     $data = Product::where("id", $id)->first();
    //     $cek = Product::where("id", $id)->count();

    //     return $data;
    // }
}
