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
            $data = Product::orderBy('nama', 'asc')->get();
        return view('home', compact('data'))->with('cart', $cart);
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
