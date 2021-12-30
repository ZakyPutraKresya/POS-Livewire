<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        date_default_timezone_set('Asia/Jakarta');
        $jam = "";
        $time = date("H");
        /* If the time is less than 1200 hours, show good morning */
        if($time >= "00" && $time < "04") {
            $jam = "Selamat Malam";
        } else if ($time >= "04" && $time < "12") {
            $jam = "Selamat Pagi";
        } else if ($time >= "12" && $time < "17") {
            $jam = "Selamat Siang";
        } else if ($time >= "17" && $time < "19") {
            $jam = "Selamat Sore";
        } else if ($time >= "19") {
            $jam = "Selamat Malam";
        }

        $orders = Order::select('order_id', 'customer_id', 'total_harga', 'tanggal_pembelian')->groupBy('order_id', 'customer_id', 'total_harga', 'tanggal_pembelian')->orderBy('tanggal_pembelian', 'DESC')->get();
        $customer = Customer::all();

        $date = Carbon::now()->subDays(7);

        $penjualanBarang = 0;
        $pendapatanKotor = 0;
  
        $tujuhHari =  Order::where('created_at', '>=', Carbon::now()->subDays(7))->get();
        $penghasilan = Order::where('created_at', '>=', Carbon::now()->subDays(7))->select('order_id', 'customer_id', 'total_harga', 'tanggal_pembelian')->groupBy('order_id', 'customer_id', 'total_harga', 'tanggal_pembelian')->orderBy('tanggal_pembelian', 'DESC')->get();
        
        foreach ($penghasilan as $key) {
            $pendapatanKotor += $key->total_harga;
        }
        
        foreach ($tujuhHari as $value) {
            $penjualanBarang += $value->jumlah;
            
        }


        return view('admin.orders.index', compact('orders', 'customer', 'jam', 'penjualanBarang', 'pendapatanKotor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resi = $id;
        $orders = Order::where('order_id', $id)->orderBy('order_id', 'DESC')->get();
        $tgl_beli = Order::where('order_id', $id)->orderBy('tanggal_pembelian', 'DESC')->first();
        return view('admin.orders.show', compact('orders', 'resi', 'tgl_beli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
