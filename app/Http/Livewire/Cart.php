<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Produk;
use Alert;
use App\Models\Category as Kategori;
use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;

class Cart extends Component
{
    public $nama;
    public $search;
    public $jumlahdiskon;
    public $jenisdiskon;
    public $searchKat;
    public $inputbayar;

    public function render()
    {
        $cart = session('cart');
        $diskon = session('diskon');
        $customer = session('customer');
        $cust = $this->searchKat == '' ? Customer::orderBy('nama', 'asc')->get() : Customer::where('nama', 'like', "%$this->searchKat%")->orderBy('nama', 'asc')->get();

        // Di set 0 agar tidak terjadi data null atau n/a
        $grandTotal = 0;
        $total = 0;
        $uangbayar = 0;
        if ($this->inputbayar == '') {
            $uangbayar = 0;
        } else {
            $uangbayar = $this->inputbayar;
        }
        

        // itung itungan geming
        foreach((array) session('cart') as $details){
            $total += $details['harga'] * $details['quantity'];
            $grandTotal = $total;
        }
        foreach((array) session('diskon') as $discount){
            if($discount['tp_diskon'] == 'Persentase'){
                $disc = ($discount['jml_diskon'] / 100) * $total;
                $grandTotal = $total - $disc;
            } else if ($discount['tp_diskon'] == 'Rupiah'){
                $grandTotal = $total - $discount['jml_diskon'];
            } else {
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'Error',
                    'text' => 'Silahkan hubungi Developer',
                    'icon' => 'error'
                ]);
            }
            
        }

        if($grandTotal <= 0){
            session()->forget('diskon');
            $grandTotal = $total;
        }
        $kembalian = $uangbayar - $grandTotal;
        $products = $this->search == '' ? Produk::orderBy('nama', 'asc')->get() : Produk::where('nama', 'like', "%$this->search%")->orderBy('nama', 'asc')->get();
        return view('livewire.cart', compact('products', 'cart', 'total', 'grandTotal', 'kembalian', 'cust', 'uangbayar', 'customer', 'diskon'));
    }

    // Tambah sesi cart
    public function addItem($id){
        $product = Produk::findOrFail($id);

        $cart = session()->get('cart', []);
            // dd($product->stok -1);
            if(isset($cart[$id])) {
                if($cart[$id]['stok'] - 1 < 0){
                    $this->dispatchBrowserEvent('swal', [
                            'title' => 'Stok Habis',
                            'text' => 'Tidak dapat Menambah',
                            'icon' => 'error'
                        ]);
                } else if($cart[$id]['stok'] - 1 >= 0){
                    $cartMin = $cart[$id]['stok'] - 1;
                    $cart[$id]['stok'] = $cartMin;
                    $cart[$id]['quantity']++;
                    session()->put('cart', $cart);
                } else {
                    $this->dispatchBrowserEvent('swal', [
                        'title' => 'Error',
                        'text' => 'Hubungi Developer',
                        'icon' => 'error'
                    ]);
                }
                
            } else {
                $cart[$id] = [
                    "id" => $id,
                    "nama" => $product->nama,
                    "quantity" => 1,
                    "harga" => $product->harga,
                    'stok' => $product->stok -1,
                ];    
                session()->put('cart', $cart);
            }

    }

    // Hapus Suatu Item dari cart
    public function removeItem($id){
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            $hitungsesi = count($cart);
            if($hitungsesi == 0){
                session()->forget('diskon');
                session()->put('cart', $cart);
                Alert::success('Berhasil', "Berhasil Menghapus");
            } else if ($hitungsesi >= 1){
                // $this->dispatchBrowserEvent('swal', [
                //     'title' => 'Deleted',
                //     'icon' => 'success'
                // ]);
                session()->put('cart', $cart);
            } else {
                session()->put('cart', $cart);
                Alert::success('Berhasil', "gagal coi");
            }
        }
    } 

    // Button -1
    public function minSatu($id){

        $cart = session()->get('cart');
        
        if($cart[$id]['quantity'] - 1 <= 0){
            unset($cart[$id]);
            session()->put('cart', $cart);
        } else if ($cart[$id]['quantity'] - 1 >= 1){
            $stokPlus = $cart[$id]['stok'] + 1;
            $qtyMin = $cart[$id]['quantity'] - 1;
            $cart[$id]['stok'] = $stokPlus;
            $cart[$id]['quantity'] = $qtyMin;
            session()->put('cart', $cart);
        } 
    }

    // Button +1
    public function plusSatu($id){

        $cart = session()->get('cart');
        
        if($cart[$id]['stok'] - 1 < 0){
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Stok Habis',
                'text' => 'Tidak dapat Menambah',
                'icon' => 'error'
            ]);
        } else if($cart[$id]['stok'] - 1 >= 0){
            $cartMin = $cart[$id]['stok'] - 1;
            $cart[$id]['stok'] = $cartMin;
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        } else {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Error',
                'text' => 'Hubungi Developer',
                'icon' => 'error'
            ]);
        }
    }

    // Tambah Sesi Diskon
    public function addDiskon($id){
        $this->validate([
            'jumlahdiskon' => 'required',
            'jenisdiskon' => 'required',
        ]);
        // dd($this->jenisdiskon);
        $diskon = session()->get('diskon');
        unset($diskon);

        if($this->jenisdiskon == 'Rupiah'){
            if($this->jumlahdiskon >= $id){
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'Gagal',
                    'text' => 'Diskon Tidak Boleh Melebihi Sub Total',
                    'icon' => 'error'
                ]);
            } else {
                $diskon[$this->jenisdiskon] = [
                    "jml_diskon" => $this->jumlahdiskon,
                    "tp_diskon" => $this->jenisdiskon,
                ];
                session()->put('diskon', $diskon);
            }
        } else if ($this->jenisdiskon == 'Persentase'){
            if($this->jumlahdiskon >= 100){
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'Gagal',
                    'text' => 'Diskon Tidak Boleh Lebih dari 100%',
                    'icon' => 'error'
                ]);
            } else {
                $diskon[$this->jenisdiskon] = [
                    "jml_diskon" => $this->jumlahdiskon,
                    "tp_diskon" => $this->jenisdiskon,
                ];
                session()->put('diskon', $diskon);
            }
        } else {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Error',
                'text' => 'Silahkan hubungi Developer',
                'icon' => 'error'
            ]);
        }
        
          
        // session()->put('diskon', $diskon);

    }


    // Tambah Pelanggan jika tidak ada
    public function addCustomer(){
        
        $tambahdata = Customer::create(
            [
                'nama' => $this->searchKat,
                'total_belanja' => 0
            ]
        );
        $cust = Customer::where('nama', $this->searchKat)->first();
        $customer = session()->get('customer');
        unset($customer);
        $customer[$this->searchKat] = [
            "id" => $cust->id,
            "nama" => $this->searchKat,
            "total_belanja" => 0,
        ];
        session()->put('customer', $customer);
    }

    // Tambah Session Pelanggan jika sudah ada
    public function addCust($id){
        $cust = Customer::findOrFail($id);

        $customer = session()->get('customer');
        unset($customer);

        $customer[$id] = [
            "id" => $cust->id,
            "nama" => $cust->nama,
            "total_belanja" => $cust->total_belanja,
        ];
        session()->put('customer', $customer);

    }

    // Batalkan transaksi
    public function batalkan(){
        $cart = session()->get('cart');
        $hitungsesi = count($cart);
        // dd($cart);
        if($hitungsesi >= 1){

            session()->forget('diskon');
            session()->forget('cart');
            session()->forget('customer');
            
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Berhasil',
                'text' => 'Pembelian Dibatalkan',
                'icon' => 'success'
            ]);

        } else {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Error',
                'text' => 'Silahkan Hubungi Developer',
                'icon' => 'error'
            ]);
        }
    }

    public function checkOut()
    {
        date_default_timezone_set('Asia/Jakarta');
        $jam = "";
        $time = date("d-m-Y H:i:s");
        $resi = "TS-".date("dm-His");

        $grandTotal = 0;
        $total = 0;
        


        $customer = session()->get('customer');
        $diskon = session()->get('diskon');

        foreach($customer as $pelanggan){

        }

        foreach((array) session('cart') as $keranjang){
            $total += $keranjang['harga'] * $keranjang['quantity'];
            $grandTotal = $total;
        }
        
        foreach((array) session('diskon') as $discount){
            if($discount['tp_diskon'] == 'Persentase'){
                $disc = ($discount['jml_diskon'] / 100) * $total;
                $grandTotal = $total - $disc;
            } else if ($discount['tp_diskon'] == 'Rupiah'){
                $grandTotal = $total - $discount['jml_diskon'];
            } else {
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'Error',
                    'text' => 'Silahkan hubungi Developer',
                    'icon' => 'error'
                ]);
            }
            
        }
        $kembali = $this->inputbayar - $grandTotal;

        // dd($kembali);
       
        // $totalin = 0;
        // $grandTotalin = 0;
        if (session('diskon')) {
            foreach((array) session('cart') as $ceks){
                $tambahdata = Order::create(
                    [
                        'order_id' => $resi,
                        'product_id' => $ceks['id'],
                        'harga_beli' => $ceks['harga'],
                        'nama_product' => $ceks['nama'],
                        'customer_id' => $pelanggan['id'],
                        'jumlah' => $ceks['quantity'],
                        'total_harga' => $grandTotal,
                        'uang_bayar' => $this->inputbayar,
                        'jumlah_diskon' => $discount['jml_diskon'],
                        'jenis_diskon' => $discount['tp_diskon'],
                        'kembalian' => $kembali,
                        'tanggal_pembelian' => $time,
    
                    ]
                );
                if ($tambahdata) {
                    $produk = Produk::findOrFail($ceks['id']);
                    
    
                    $produk->update([
                        'stok' => $produk->stok - $ceks['quantity'],
                    ]);
    
                    session()->forget('diskon');
                    session()->forget('cart');
                    session()->forget('customer');
    
                    $this->dispatchBrowserEvent('swal', [
                        'title' => 'Berhasil',
                        'text' => 'Pembelian Berhasil',
                        'icon' => 'success'
                    ]);
                } else {
                    $this->dispatchBrowserEvent('swal', [
                        'title' => 'Error',
                        'text' => 'Pembelian Gagal',
                        'icon' => 'error'
                    ]);
                }
            }
        } else {
            foreach((array) session('cart') as $ceks){
                $tambahdata = Order::create(
                    [
                        'order_id' => $resi,
                        'product_id' => $ceks['id'],
                        'harga_beli' => $ceks['harga'],
                        'nama_product' => $ceks['nama'],
                        'customer_id' => $pelanggan['id'],
                        'jumlah' => $ceks['quantity'],
                        'total_harga' => $grandTotal,
                        'uang_bayar' => $this->inputbayar,
                        'jumlah_diskon' => 0,
                        'jenis_diskon' => 'Tanpa Diskon',
                        'kembalian' => $kembali,
                        'tanggal_pembelian' => $time,
    
                    ]
                );
                if ($tambahdata) {
                    $produk = Produk::findOrFail($ceks['id']);
    
                    $produk->update([
                        'stok' => $produk->stok - $ceks['quantity'],
                    ]);
    
                    session()->forget('diskon');
                    session()->forget('cart');
                    session()->forget('customer');
    
                    $this->dispatchBrowserEvent('swal', [
                        'title' => 'Berhasil',
                        'text' => 'Pembelian Berhasil',
                        'icon' => 'success'
                    ]);
                } else {
                    $this->dispatchBrowserEvent('swal', [
                        'title' => 'Error',
                        'text' => 'Pembelian Gagal',
                        'icon' => 'error'
                    ]);
                }
            }
        }
        $pembeli = Customer::findOrFail($pelanggan['id']);

        $pembeli->update([
            'total_belanja' => $pembeli->total_belanja + $grandTotal,
        ]);
        
    }

}
