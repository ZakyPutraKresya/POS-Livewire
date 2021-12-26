<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use Alert;

class KasirController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Declare Session
        $cart = session('cart');
        $diskon = session('diskon');

        // Di set 0 agar tidak terjadi data null atau n/a
        $grandTotal = 0;
        $total = 0;

        // itung itungan geming
        foreach((array) session('cart') as $id => $details){
            $total += $details['harga'] * $details['quantity'];
            $grandTotal = $total;
        }
        foreach((array) session('diskon') as $dsk => $discount){
            if($discount['tp_diskon'] == 'Persentase'){
                $disc = ($discount['jml_diskon'] / 100) * $total;
                $grandTotal = $total - $disc;
            } else if ($discount['tp_diskon'] == 'Rupiah'){
                $grandTotal = $total - $discount['jml_diskon'];
            } else {
                Alert::error('Gagal', 'Ada yang Error');
                return redirect()->route('kasir.index');
            }
            
        }

        if($grandTotal <= 0){
            session()->forget('diskon');
            $grandTotal = $total;
            Alert::success('Berhasil', "Diskon direset");
        }
        // Ambil data produk lalu dikembalikan
        $data = Product::orderBy('nama', 'asc')->get();
        return view('kasir.index', compact('data', 'grandTotal', 'total'))->with('cart', $cart)->with('diskon', $diskon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_cart(Request $request)
    {
        //
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
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

    public function tambah_cart($id){
        
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nama" => $product->nama,
                "quantity" => 1,
                "harga" => $product->harga
            ];
        }
          
        session()->put('cart', $cart);
        // Alert::success('Berhasil', 'Data Dimasukkan Keranjang');
        return redirect()->back();
    }


    public function tambah_diskon(Request $request){
        
        // $product = Product::findOrFail($id);
        
        $diskon = session()->get('diskon');
        unset($diskon);

        if($request->tipe_diskon == 'Rupiah'){
            if($request->jumlah_diskon >= $request->total_harga){
                Alert::error('Gagal', 'Diskon tidak boleh melebihi Total harga');
                return redirect()->route('kasir.index');
            } else {
                $diskon[$request->jumlah_diskon] = [
                    "jml_diskon" => $request->jumlah_diskon,
                    "tp_diskon" => $request->tipe_diskon
                ];
                session()->put('diskon', $diskon);
            }
        } else if ($request->tipe_diskon == 'Persentase'){
            if($request->jumlah_diskon >= 100){
                Alert::error('Gagal', 'Diskon tidak boleh 100 Persen atau lebih');
                return redirect()->route('kasir.index');
            } else {
                $diskon[$request->jumlah_diskon] = [
                    "jml_diskon" => $request->jumlah_diskon,
                    "tp_diskon" => $request->tipe_diskon
                ];
                session()->put('diskon', $diskon);
            }
        } else {
            Alert::error('Gagal', 'Ada yang Error');
            return redirect()->route('kasir.index');
        }
        
          
        session()->put('diskon', $diskon);
        // Alert::success('Berhasil', 'Data Dimasukkan Keranjang');
        return redirect()->back();
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        // foreach((array) session('cart') as $details){
        //     $total += $details['harga'] * $details['quantity'];
        // }
        $cart = session()->get('cart');
        if(isset($cart[$request->id])) {
            unset($cart[$request->id]);
            $hitungsesi = count($cart);
            if($hitungsesi == 0){
                session()->forget('diskon');
                session()->put('cart', $cart);
            } else if ($hitungsesi >= 1){
                session()->put('cart', $cart);
            } else {
                session()->put('cart', $cart);
                Alert::success('Berhasil', "gagal coi");
            }
        }
    }
}