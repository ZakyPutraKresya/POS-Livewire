
@section('content')

<!-- ========================= SECTION CONTENT ========================= -->
<div class="container-fluid">
    <section class="section-content padding-y-sm bg-default ml-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 padding-y-sm card ">
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
                                <form class="position-relative" data-bs-toggle="search" data-bs-display="static"
                                    action="/home/search" method="get">
                                    <input class="form-control search-input fuzzy-search" type="search" name="search"
                                        placeholder="Cari Produk..." aria-label="Search" />
                                    <span class="fas fa-search search-box-icon"></span>
                                </form>
                                <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none"
                                    data-bs-dismiss="search">
                                    <div class="btn-close-falcon" aria-label="Close"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <span id="items">
                        <div class="row ml-1 mr-1">

                            @forelse($data as $dt => $val)
                            <div class="col-md-4">
                                <figure class="card card-product" role="tabpanel"
                                    aria-labelledby="tab-dom-55d552bf-cdbd-40f9-856d-410188578fda"
                                    id="dom-55d552bf-cdbd-40f9-856d-410188578fda">
                                    <figcaption class="info-wrap"
                                        data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                                        <a href="#" class="title">{{$val->nama}}</a>
                                        <div class="action-wrap">
                                            @if($val->stok == 0)
                                            <button class="btn btn-danger btn-sm float-right" disabled> <i
                                                    class="fas fa-ban"></i> Habis </button>
                                            @else
                                            <a href="{{ route('tambah.cart', $val->id) }}"
                                                class="btn btn-primary btn-sm float-right"> <i
                                                    class="fa fa-cart-plus"></i>
                                                Add </a>
                                            @endif
                                            <div class="price-wrap h5">
                                                <span class="price-new">Rp. {{Str::currency($val->harga)}}</span>
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
                    <div class="card shadow-none">
                        <span id="cart">
                            <table class="table table-hover shopping-cart-wrap">
                                <thead class="text-muted">
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th scope="col" width="120">Qty</th>
                                        <th scope="col" width="120">Price</th>
                                        <th scope="col" class="text-right" width="200">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(session('cart'))
                                    @foreach(session('cart') as $id => $val)
                                    <tr data-id="{{ $id }}">
                                        <td>
                                            <figure class="media">
                                                <figcaption class="media-body">
                                                    <h6 class="title text-capitalize text-truncate mt-4">
                                                        {{$val['nama']}}</h6>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td class="text-center" data-th="Quantity">
                                            <input type="number" min="1" value="{{ $val['quantity'] }}"
                                                class="form-control quantity update-cart mt-3" />
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price mt-3">{{Str::currency($val['harga'])}}</var>
                                            </div> <!-- price-wrap .// -->
                                        </td>
                                        <td class="text-right">
                                            <input type="hidden" value="{{$total}}" name="remove-from-cart total_harga">
                                            <button type="submit" class="btn mt-2 btn-outline-danger remove-from-cart"> <i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center" colspan="4">
                                            <div class="price-wrap">
                                                <var class="price mt-3">Keranjang Kosong</var>
                                            </div> <!-- price-wrap .// -->
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </span>
                    </div> <!-- card.// -->
                    <hr>
                    
                    <div class="box">
                        <dl class="dlist-align">
                            <dt>Pajak :</dt>
                            <dd class="text-right">0%</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Diskon :</dt>
                            @forelse((array) session('diskon') as $dsk => $discount)
                            @if($discount['tp_diskon'] == 'Persentase')
                            <dd class="text-right"><a href="#tambah-diskon" data-bs-toggle="modal">{{$discount['jml_diskon']}}%</a></dd>
                            @else
                            <dd class="text-right"><a href="#tambah-diskon" data-bs-toggle="modal">Rp. {{Str::currency($discount['jml_diskon'])}}</a></dd>
                            @endif
                            @empty
                            <dd class="text-right"><a href="#tambah-diskon" data-bs-toggle="modal">0</a></dd>
                            @endforelse
                            
                        </dl>
                        <dl class="dlist-align">
                            <dt>Sub Total :</dt>
                            <dd class="text-right">Rp. {{Str::currency($total)}}</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total : </dt>
                            <dd class="text-right h4 b">Rp. {{Str::currency($grandTotal)}} </dd>
                        </dl>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="btn  btn-danger btn-error btn-lg btn-block"><i
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
</div>

@forelse((array) session('cart') as $crt)
<div class="modal fade" id="tambah-diskon" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-md mt-6" role="document">
        <div class="modal-content border-0">
            <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                    <h4 class="mb-0 text-white" id="authentication-modal-label">Tambah Diskon</h4>
                    <p class="fs--1 mb-0 text-white">Tolong pastikan semua Data ter-isi</p>
                </div>
                <button class="btn-close btn-close-white position-absolute top-2 end-0 me-2" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body py-4 px-5">
                <form class="needs-validation" novalidate="" action="{{route('tambah.diskon')}}" method="get">
                    @csrf
                    <div class="row gx-2">
                        <div class="mb-3 col-sm-12 position-relative">
                            <label class="form-label" for="modal-diskon">Jumlah Diskon</label>
                            <input class="form-control" required="" placeholder="Masukkan Diskon" type="number"
                                name="jumlah_diskon" autocomplete="on" id="modal-diskon" />
                            <div class="invalid-tooltip">Masukkan Jumlah Diskon Dahulu</div>
                        </div>
                    </div>
                    <div class="row gx-2">
                        <div class="mb-3 col-sm-12 position-relative">
                            <label for="Jenis">Jenis</label>
                            <select class="form-select" name="tipe_diskon" id="validationTooltip04" required="">
                                <option selected="" disabled="" value="">Pilih Tipe Diskon</option>
                                <option value="Persentase">Persentase</option>
                                <option value="Rupiah">Rupiah</option>
                            </select>
                            <div class="invalid-tooltip">Pilih Tipe Diskon Dahulu</div>
                        </div>
                    </div>

                    <input type="hidden" name="total_harga" value="{{$total}}">
                    <div class="mb-3">
                        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@empty
<div class="modal fade" id="tambah-diskon" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-md mt-6" role="document">
        <div class="modal-content border-0">
            <div class="modal-body px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                    <h4 class="mb-0 text-white" id="authentication-modal-label">Tambahkan Produk dahulu</h4>
                </div>
                <button class="btn-close btn-close-white position-absolute top-2 end-0 me-2" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
@endforelse
@endsection