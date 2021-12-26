
<div>
    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y-sm bg-default ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 card padding-y-sm card ">
                    <div class="row">
                        <div class="col-7">
                            <div class="row">
                                <div class="col-4">
                                    <h4 class="ml-3 mt-1">List Produk</h4>
                                </div>
                                <div class="col-8">@if ($message = Session::get('success'))
                                    <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                                        <div class="bg-success me-3 icon-item"><span
                                                class="fas fa-check-circle text-white fs-3"></span>
                                        </div>
                                        <p class="mb-0 flex-1">{{ $message }}</p>
                                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif
                                    @if(request()->is('home/search'))
                                    <a href="{{route('home')}}" class="btn btn-secondary text-white"><i
                                            class="fas fa-chevron-circle-left"></i> Kembali</a>
                                    @endif</div>
                            </div>


                        </div>
                        <div class="col-5">
                            <div class="search-box mb-3" data-list='{"valueNames":["title"]}'>
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
                                    data-bs-dismiss="search">
                                    <div class="btn-close-falcon" aria-label="Close"></div>
                                </div>

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
                                            <button type="button" disabled=""
                                                class="btn btn-danger btn-sm float-right">
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
                            <table class="table table-hover shopping-cart-wrap">
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
                                            <span>{{$val['stok']}}</span>
                                            <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group"
                                                aria-label="...">
                                                <button type="button" wire:click="{{$val['id']}}" class="m-btn btn btn-default"><i
                                                        class="fa fa-minus"></i></button>
                                                <button type="button"
                                                    class=" btn btn-default">{{$val['quantity']}}</button>
                                                <button type="button" class="m-btn btn btn-default"><i
                                                        class="fa fa-plus"></i></button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price">{{Str::currency($val['harga'])}}</var>
                                            </div> <!-- price-wrap .// -->
                                        </td>
                                        <td class="text-right">
                                            <button wire:click="removeItem({{$val['id']}})" class="btn btn-outline-danger"> <i
                                                    class="fa fa-trash"></i></a>
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
                            <dt>Discount:</dt>
                            <dd class="text-right"><a href="#">0%</a></dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Tax: </dt>
                            <dd class="text-right">0%</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right"><a href="#">0%</a></dd>
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
                            <div class="col-md-6">
                                <a href="#" class="btn  btn-default btn-error btn-lg btn-block"><i
                                        class="fa fa-times-circle "></i> Cancel </a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="btn  btn-primary btn-lg btn-block"><i class="fa fa-shopping-bag"></i>
                                    Charge </a>
                            </div>
                        </div>
                    </div> <!-- box.// -->
                </div>
            </div>
        </div><!-- container //  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
</div>