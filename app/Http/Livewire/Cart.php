<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product as Produk;
use Alert;

class Cart extends Component
{
    public $nama;
    public $search;

    public function render()
    {
        $cart = session('cart');
        $no_order = session('no_order');

        // Di set 0 agar tidak terjadi data null atau n/a
        $grandTotal = 0;
        $total = 0;

        // itung itungan geming
        foreach((array) session('cart') as $id => $details){
            $total += $details['harga'] * $details['quantity'];
            $grandTotal = $total;
        }
        $products = $this->search == '' ? Produk::orderBy('nama', 'asc')->get() : Produk::where('nama', 'like', "%$this->search%")->orderBy('nama', 'asc')->get();
        return view('livewire.cart', compact('products', 'cart', 'no_order', 'total', 'grandTotal'));
    }
    
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
}
