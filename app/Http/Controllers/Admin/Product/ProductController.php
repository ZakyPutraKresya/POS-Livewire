<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Alert;
use App\Models\Category;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use App\Models\Order;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $category = Category::all();
        $product = Product::all();
        

        return view('admin.product.index', compact('product', 'category'));
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
            return redirect()->route('product.index');
        } else {
            return redirect()->route('product.index');
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
        // Mengdecrypt id yang dituju atau mendeksripsikan enskripsi yang dituju
        $id = Crypt::decrypt($id);

        $products = Product::where('id', $id)->first();
        $category = Category::all();
        return view('admin.product.edit', compact('products', 'category'));
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
        //get data Blog by ID
        $product = Product::findOrFail($id);

        $product->update([
            'nama'     => $request->nama,
            'kategori_id'   => $request->kategori_id,
            'harga' => $request->harga,
            'harga_modal' => $request->harga_modal,
            'stok' => $request->stok,
            'jenis' => $request->jenis
        ]);

        if ($product) {
            Alert::success('Berhasil', 'Data Produk Berhasil Di Update');
            return redirect()->route('product.index');
        } else {
            Alert::error('Gagal', 'Data Produk Gagal Di Update');
            return redirect()->route('product.index');
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