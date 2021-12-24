<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Alert;
use App\Models\Category;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
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
        $category = Category::all();
        $product = Product::all();

        return view('admin.product.index', compact('product', 'jam', 'category'));
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
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'harga_modal' => 'required',
            'kategori_id' => 'required',
            'stok' => 'required',
            'jenis' => 'required'
        ]);

        $tambahdata = Product::create(
            [
                'nama' => $request->nama,
                'kategori_id' => $request->kategori_id,
                'harga' => $request->harga,
                'harga_modal' => $request->harga_modal,
                'stok' => $request->stok,
                'jenis' => $request->jenis
            ]
        );

        if ($tambahdata){
            Alert::success('Berhasil', 'Data Produk Berhasil Ditambahkan');
            return redirect()->route('product.index')->with('success', 'Data Product Berhasil Ditambah');
        } else {
            return redirect()->route('product.index')->with('success', 'Data Product Gagal Ditambah');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $category = Product::findorfail($id);
        $category->delete();
        Alert::success('Berhasil', 'Data Produk Berhasil Dihapus');
        return redirect()->route('product.index')->with('success', 'Data Product Berhasil Dihapus');
    }

    public function stock()
    {
        return view('admin.product.stock');
    }

}