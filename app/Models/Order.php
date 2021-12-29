<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = ['order_id', 'product_id', 'nama_product', 'harga_beli' , 'customer_id', 'jumlah', 'total_harga', 'uang_bayar', 'kembalian', 'tanggal_pembelian', 'jumlah_diskon', 'jenis_diskon'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
