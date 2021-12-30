<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Customer;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Hitung Pendapatan
        $kemarin = Order::whereDate('created_at', Carbon::yesterday())->select('order_id', 'customer_id', 'total_harga', 'tanggal_pembelian', 'jumlah')->groupBy('order_id', 'customer_id', 'total_harga', 'tanggal_pembelian', 'jumlah')->orderBy('tanggal_pembelian', 'DESC')->get();
        $hariIni = Order::whereDate('created_at', Carbon::today())->select('order_id', 'customer_id', 'total_harga', 'tanggal_pembelian')->groupBy('order_id', 'customer_id', 'total_harga', 'tanggal_pembelian')->orderBy('tanggal_pembelian', 'DESC')->get();
        $keuntunganKemarin = 0;
        $keuntunganHariIni = 0;
        $persenan1 = 0;
        foreach ($kemarin as $key) {
            $keuntunganKemarin += $key->total_harga;
        }
        foreach ($hariIni as $key) {
            $keuntunganHariIni += $key->total_harga;
        }
        $persenan1 = $keuntunganHariIni - $keuntunganKemarin;
        if ($keuntunganKemarin <= 0) {
            $persenPendapatan = 0;
        } else {
            $persenPendapatan = ($persenan1 / $keuntunganKemarin) * 100;
        }

        // Hitung Pelanggan Terdaftar
        $hitungCustomer = 0;
        $hitungCustomer = count(Customer::all());

        // Hitung Orderan 
        $hitungOrderHariIni = 0;
        $hitungOrderKemarin = 0;
        $persenOrder = 0;

        $hariIni2 = Order::whereDate('created_at', Carbon::today())->get();
        $kemarin2 = Order::whereDate('created_at', Carbon::yesterday())->get();
        foreach ($hariIni2 as $key) {
            $hitungOrderHariIni += $key->jumlah;
        }
        foreach ($kemarin2 as $key) {
            $hitungOrderKemarin += $key->jumlah;
        }
        $persenOrder = $hitungOrderHariIni - $hitungOrderKemarin;
        if ($hitungOrderKemarin <= 0) {
            $persenOrderan = 0;
        } else {
            $persenOrderan = ($persenOrder / $hitungOrderKemarin) * 100;
        }

        return view('admin.index', compact('persenPendapatan', 'hitungCustomer', 'keuntunganHariIni', 'hitungOrderHariIni', 'persenOrderan'));
        
    }
}
