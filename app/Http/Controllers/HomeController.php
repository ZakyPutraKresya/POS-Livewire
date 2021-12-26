<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'kasir'){
        $cart = session('cart');
        $diskon = session('diskon');

        // Di set 0 agar tidak terjadi data null atau n/a
        $grandTotal = 0;
        $total = 0;

        // itung itungan geming
        foreach((array) session('cart') as $id => $details){
            $total += $details['harga'] * $details['quantity'];
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

        $data = Product::orderBy('nama', 'asc')->get();
        return view('home', compact('data', 'grandTotal', 'total'))->with('cart', $cart)->with('diskon', $diskon);

        } else {

            $data = Product::orderBy('nama', 'asc')->get();
            return view('home', compact('data'));

        }
        
        
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $data = Product::where('nama', 'like', '%'.$search.'%')->orderBy('nama', 'asc')->get();
        return view('home', compact('data'));
    }

}
