<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Alert;
use Illuminate\Support\Facades\Crypt;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::orderBy('nama', 'ASC')->get();
        return view('admin.customers.index', compact('customer'));
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
        $validasi = array(
            'nama' => 'required|unique:customers'
        );

        $validator = Validator::make($request->all(), $validasi);
        if ($validator->fails()) {
            Alert::error('Gagal', 'Data Pelanggan ini sudah ada');
            return redirect()->route('customers.index');

        } else {

            $tambahdata = Customer::create(
                [
                    'nama' => $request->nama,
                    'total_belanja' => 0
                ]
            );
    
            if ($tambahdata){
                Alert::success('Berhasil', 'Data Customer Berhasil Ditambahkan');
                return redirect()->route('customers.index');
            } else {
                Alert::error('Gagal', 'Data Customer Gagal Ditambahkan');
                return redirect()->route('customers.index');
            }

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
        $id = Crypt::decrypt($id);
        $customer = Customer::where('id', $id)->first();
        $orders = Order::where('customer_id', $id)->select('order_id', 'total_harga', 'tanggal_pembelian')->groupBy('order_id', 'total_harga', 'tanggal_pembelian')->orderBy('tanggal_pembelian', 'DESC')->get();
        return view('admin.customers.show', compact('customer', 'orders'));
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

        $customers = Customer::where('id', $id)->first();
        return view('admin.customers.edit', compact('customers'));
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
        $customer = Customer::findOrFail($id);

        $validasi = array(
            'nama' => 'required|unique:customers'
        );

        $validator = Validator::make($request->all(), $validasi);
        if ($validator->fails()) {
            Alert::error('Gagal Edit', 'Data Pelanggan ini sudah ada');
            return redirect()->route('customers.index');

        } else {

            $customer->update([
                'nama'     => $request->nama
            ]);
    
            if ($customer) {
                Alert::success('Berhasil', 'Data Pelanggan Berhasil Di Update');
                return redirect()->route('customers.index');
            } else {
                Alert::error('Gagal', 'Data Pelanggan Gagal Di Update');
                return redirect()->route('customers.index');
            }
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
        $customers = Customer::findorfail($id);
        $customers->delete();
        Alert::success('Berhasil', 'Data Produk Berhasil Dihapus');
        return redirect()->route('customers.index');
    }
}
