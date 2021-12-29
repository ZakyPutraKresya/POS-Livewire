<div>
    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y-sm bg-default ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 card padding-y-sm card ">
                    <div class="row">
                        <div class="col-7">
                            <div class="row">
                                <div class="col-12">
                                    <h4>List Produk</h4>
                                </div>
                            </div>


                        </div>
                        <div class="col-5 mb-4">
                            <form class="search-wrap">
                                <div class="input-group">
                                    <input type="text" class="form-control" wire:model="search" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none"
                                data-dismiss="search">
                                <div class="btn-close-falcon" aria-label="Close"></div>
                            </div>
                        </div>
                    </div>
                    <span id="items">
                        <div class="row">

                            @forelse($products as $product)
                            <div class="col-md-4">
                                <figure class="card card-product" role="tabpanel"
                                    aria-labelledby="tab-dom-55d552bf-cdbd-40f9-856d-410188578fda"
                                    id="dom-55d552bf-cdbd-40f9-856d-410188578fda">
                                    @if($product->stok == 0)
                                    <span class="badge-new"> Habis </span>
                                    @endif
                                    <figcaption class="info-wrap">
                                        <h5 class="title">{{$product->nama}}</h5>
                                        <div class="action-wrap">
                                            @if($product->stok == 0)
                                            <button type="button" disabled="" class="btn btn-danger btn-sm float-right">
                                                <i class="fas fa-ban"></i>
                                                Habis
                                            </button>
                                            @endif
                                            @if($product->stok >= 1)
                                            <button wire:click="addItem({{$product->id}})"
                                                class="btn btn-primary btn-sm float-right"> <i
                                                    class="fa fa-cart-plus"></i>
                                                Add </button>
                                            @endif
                                            <div class="price-wrap h6">
                                                <span class="price-new  ">Rp. {{Str::currency($product->harga)}}</span>
                                            </div> <!-- price-wrap.// -->

                                        </div> <!-- action-wrap -->
                                    </figcaption>
                                </figure>
                            </div>
                            @empty
                            <div class="col-md-12">
                                <figure class="card bg-soft-danger card-product" role="tabpanel"
                                    aria-labelledby="tab-dom-55d552bf-cdbd-40f9-856d-410188578fda"
                                    id="dom-55d552bf-cdbd-40f9-856d-410188578fda">
                                    <figcaption class="info-wrap"
                                        data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>

                                        <div class="action-wrap text-center">
                                            <div class="price-wrap h5">
                                                <i class="fas fa-ban"></i>
                                                <span class="price-new">Data Produk kosong atau Tidak ditemukan</span>
                                            </div> <!-- price-wrap.// -->

                                        </div> <!-- action-wrap -->
                                    </figcaption>
                                </figure>
                            </div>
                            @endforelse
                        </div> <!-- row.// -->
                    </span>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <span id="cart">
                            <table class="table table-hover shopping-cart-wrap pr-5">
                                <thead class="text-muted">
                                    <tr>
                                        <th scope="col">Barang</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col" width="120">Harga</th>
                                        <th scope="col" class="text-right" width="200">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(session('cart'))
                                    @foreach(session('cart') as $id => $val)
                                    <tr>
                                        <td>
                                            <figure class="media">
                                                <figcaption class="media-body">
                                                    <h6 class="title" style="width: 120px;">{{$val['nama']}}</h6>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td class="text-center">
                                            <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group"
                                                aria-label="...">
                                                <button type="button" wire:click="minSatu({{$val['id']}})"
                                                    class="m-btn btn btn-default"><i class="fa fa-minus"></i></button>
                                                <button type="button"
                                                    class=" btn btn-default">{{$val['quantity']}}</button>
                                                <button type="button" wire:click="plusSatu({{$val['id']}})"
                                                    class="m-btn btn btn-default"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price">{{Str::currency($val['harga'])}}</var>
                                            </div> <!-- price-wrap .// -->
                                        </td>
                                        <td class="text-right">
                                            <button wire:click="removeItem({{$val['id']}})"
                                                class="btn btn-outline-danger"> <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center" colspan="4">
                                            <div class="price-wrap">
                                                <var class="price mt-3 mb-3">Keranjang Kosong</var>
                                            </div> <!-- price-wrap .// -->
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </span>
                    </div> <!-- card.// -->
                    <div class="box">
                        <dl class="dlist-align">
                            <dt>Pembeli :</dt>
                            @forelse((array) session('customer') as $cst)
                            <dd class="text-right text-capitalize"><a href="#tambah-customer"
                                    data-toggle="modal"><strong>{{$cst['nama']}}</strong></a></dd>
                            @empty
                            <dd class="text-right"><a href="#tambah-customer" data-toggle="modal">N/A</a></dd>
                            @endforelse
                        </dl>
                        <dl class="dlist-align">
                            <dt>Discount:</dt>
                            @forelse((array) session('diskon') as $dsk => $discount)
                            @if($discount['tp_diskon'] == 'Persentase')
                            <dd class="text-right"><a href="#tambah-diskon"
                                    data-toggle="modal">{{$discount['jml_diskon']}}%</a></dd>
                            @else
                            <dd class="text-right"><a href="#tambah-diskon" data-toggle="modal">Rp.
                                    {{Str::currency($discount['jml_diskon'])}}</a></dd>
                            @endif
                            @empty
                            <dd class="text-right"><a href="#tambah-diskon" data-toggle="modal">Tanpa Diskon</a></dd>
                            @endforelse
                        </dl>
                        <dl class="dlist-align">
                            <dt>Sub Total:</dt>
                            <dd class="text-right">Rp. {{Str::currency($total)}}</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total: </dt>
                            <dd class="text-right h4 b">Rp. {{Str::currency($grandTotal)}}</dd>
                        </dl>
                        <div class="row">
                            @if(session('cart'))
                            <div class="col-md-6">
                                <a href="#" wire:click="batalkan()" class="btn btn-danger btn-lg btn-block"><i
                                        class="fa fa-times-circle "></i>
                                    Batal </a>
                            </div>
                            @else
                            <div class="col-md-6">
                                <button type="button" disabled class="btn btn-danger btn-lg btn-block"><i
                                        class="fa fa-times-circle "></i>
                                    Batal </button>
                            </div>
                            @endif
                            @if(session('cart'))
                            @if(session('customer'))
                            <div class="col-md-6">
                                <a href="#checkout" data-toggle="modal" class="btn  btn-primary btn-lg btn-block"><i
                                        class="fa fa-shopping-bag"></i>
                                    Bayar </a>
                            </div>
                            @else
                            <div class="col-md-6">
                                <button disabled class="btn  btn-primary btn-lg btn-block"><i
                                        class="fa fa-shopping-bag"></i>
                                    Bayar </button>
                            </div>
                            @endif
                            @else
                            <div class="col-md-6">
                                <button disabled class="btn  btn-primary btn-lg btn-block"><i
                                        class="fa fa-shopping-bag"></i>
                                    Bayar </button>
                            </div>
                            @endif
                        </div>
                    </div> <!-- box.// -->
                </div>
            </div>
        </div><!-- container //  -->
    </section>
    @forelse((array) session('cart') as $krnjg)
    <!-- ========================= SECTION CONTENT END// ========================= -->
    <div wire:ignore.self class="modal fade" id="tambah-diskon" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLa">Input Diskon :</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row gx-2">
                        <div class="mb-3 col-sm-12 position-relative">
                            <label class="form-label" for="modal-diskon">Jumlah Diskon</label>
                            <input class="form-control" wire:model="jumlahdiskon" placeholder="Masukkan Diskon"
                                type="number" min="0" name="jumlahdiskon" id="modal-diskon" />
                            @error('jumlahdiskon')<span style="color: red;">Masukkan jumlah diskon
                                dahulu</span>@enderror

                        </div>
                    </div>
                    <div class="row gx-2">
                        <div class="mb-3 col-sm-12 position-relative">
                            <label for="organizerSingle">Tipe Diskon</label>
                            <select wire:model="jenisdiskon" class="form-control">
                                <option value="">Pilih Jenis Diskon</option>
                                <option value="Persentase">Persentase</option>
                                <option value="Rupiah">Rupiah</option>
                            </select>
                            @error('jenisdiskon')<span style="color: red;">Pilih jenis diskon dahulu</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="addDiskon({{$total}})" data-dismiss="modal"
                        class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="modal fade" id="tambah-diskon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h5><strong>Masukkan Barang ke Keranjang Dahulu</strong></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforelse
    <div wire:ignore.self class="modal fade" id="tambah-customer" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row gx-2">
                        <div class="mb-3 col-sm-12 position-relative">
                            <label class="form-label mt-1" for="modal-diskon">
                                <h5>Pelanggan Sekarang :</h5>
                            </label>
                            @forelse((array) session('customer') as $cst)
                            <strong><span class="float-right text-capitalize" style="font-size: 20px;">{{$cst['nama']}}
                                    ( Rp. {{$cst['total_belanja']}} )</span></strong>
                            @empty
                            <strong><span class="float-right" style="font-size: 20px;">N/A</span></strong>
                            @endforelse
                        </div>
                    </div>
                    <div class="row gx-2">
                        <div class="mb-3 col-sm-12 position-relative">
                            <label class="form-label" for="modal-diskon">Cari Pelanggan</label>
                            <input class="form-control" wire:model="searchKat" placeholder="Masukkan Nama Pelanggan"
                                type="text" name="jumlahdiskon" id="modal-diskon" />

                        </div>
                    </div>
                    <div class="row gx-2">

                        <table class="table table-hover shopping-cart-wrap pr-5">
                            <tbody>
                                @forelse($cust as $pelanggan)
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-12 position-relative">
                                                <label class="form-label mt-2 text-capitalize" for="modal-diskon">
                                                    <strong>{{$pelanggan->nama}}</strong>
                                                </label>
                                                <button type="button" wire:click="addCust({{$pelanggan->id}})"
                                                    class="float-right btn btn-primary">Pilih</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <form>
                                                    <button type="button" wire:click="addCustomer()"
                                                        class="btn btn-primary">Tambah Pelanggan Ini</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="checkout" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Check Out</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row gx-2">
                        <div class="mb-3 col-sm-12 position-relative">
                            <label class="form-label mt-1" for="modal-diskon">
                                <h5>Pelanggan Sekarang :</h5>
                            </label>
                            @forelse((array) session('customer') as $cst)
                            <strong><span class="float-right text-capitalize" style="font-size: 20px;">{{$cst['nama']}}</span></strong>
                            @empty
                            <strong><span class="float-right" style="font-size: 20px;">N/A</span></strong>
                            @endforelse
                        </div>
                    </div>
                    <div class="row gx-2">
                        <div class="mb-3 col-sm-12 position-relative">
                            <label class="form-label" for="modal-diskon">Uang Bayar</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp. </div>
                                </div>
                                <input type="number"  min="0" wire:model="inputbayar"
                                    class="form-control" id="inputku">
                            </div>

                        </div>
                    </div>
                    <div class="row gx-2">

                        <table class="table table-hover shopping-cart-wrap pr-5">
                            <thead class="text-muted">
                                <tr>
                                    <th scope="col">Barang</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col" class="text-right">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse((array) session('cart') as $co)
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <figcaption class="media-body">
                                                <h6 class="title" style="width: 120px;"><strong>{{$co['nama']}}</strong>
                                                </h6>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group"
                                            aria-label="...">
                                            <button type="button" class=" btn btn-default"
                                                disabled>{{$co['quantity']}}</button>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="price-wrap">
                                            <var class="price">Rp. {{Str::currency($co['harga'])}}</var>
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <hr style="width:98%;">
                        <div class="container-fluid">
                            <div class="row gx-2">
                                <div class="mb-3 col-sm-12 position-relative">
                                    <label class="form-label mt-1" for="modal-diskon">
                                        <strong>Total Harga :</strong>
                                    </label>
                                    <strong><span class="float-right">Rp. {{Str::currency($grandTotal)}}</span></strong>
                                </div>
                                <div class="mb-3 col-sm-12 position-relative">
                                    <label class="form-label mt-1" for="modal-diskon">
                                        <strong>Uang Bayar :</strong>
                                    </label>
                                    <strong><span class="float-right">Rp. {{Str::currency($uangbayar)}}</span></strong>
                                </div>
                                @if($kembalian < 0)
                                <div class="mb-3 col-sm-12 position-relative">
                                    <label class="form-label mt-1" for="modal-diskon">
                                        <strong>Kembali :</strong>
                                    </label>
                                    <strong><span class="float-right">Uang Kurang!</span></strong>
                                </div>
                                @else
                                <div class="mb-3 col-sm-12 position-relative">
                                    <label class="form-label mt-1" for="modal-diskon">
                                        <strong>Kembali :</strong>
                                    </label>
                                    <strong><span class="float-right">Rp. {{Str::currency($kembalian)}}</span></strong>
                                </div>
                                @endif
                                @if($kembalian < 0)
                                <div class="mb-3 col-sm-12 position-relative">
                                    <div class="float-right">
                                        <button type="button" class="btn btn-danger" disabled><i class="fas fa-ban"></i> Uang Kurang</button>
                                    </div>
                                </div>
                                @else
                                <div class="mb-3 col-sm-12 position-relative">
                                    <div class="float-right">
                                        <form>
                                            <button type="button" data-dismiss="modal" wire:click="checkOut()" class="btn btn-primary"><i class="fas fa-money-bill-alt"></i> Bayar & Selesai</button>
                                        </form>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->