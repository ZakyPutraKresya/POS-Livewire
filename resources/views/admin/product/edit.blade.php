@extends('layouts.template')
@section('title_page')
Product
@endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('product.index')}}">Produk</a></li>
<li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0" data-anchor="data-anchor">Ubah Data Product</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel"
                aria-labelledby="tab-dom-f6012467-4a1f-4b44-baf9-8005e8007fac"
                id="dom-f6012467-4a1f-4b44-baf9-8005e8007fac">
                <form class="needs-validation" novalidate="" method="post" action="{{route('product.update', $products->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row gx-2">
                        <div class="mb-3 col-sm-6 position-relative">
                            <label class="form-label" for="modal-nama-produk">Nama Produk</label>
                            <input class="form-control" required="" placeholder="Masukkan Nama Produk"
                                type="nama-produk" name="nama" value="{{$products->nama}}" autocomplete="on" id="modal-nama-produk" />
                            <div class="invalid-tooltip">Masukkan Nama Produk Dahulu</div>
                        </div>
                        <div class="mb-3 col-sm-6 position-relative">
                            <label for="Kategori">Kategori</label>
                            <select class="form-select" name="kategori_id" id="validationTooltip04" value="" required="">
                                <option selected="" disabled="" value="">Choose...</option>
                                @foreach($category as $kategori)
                                <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-tooltip">Pilih Kategori Dahulu</div>
                        </div>
                        <div class="mb-3 col-sm-6 position-relative">
                            <label class="form-label" for="modal-stok-produk">Stok Produk</label>
                            <input min="0" class="form-control" required="" placeholder="Masukkan Stok Produk"
                                type="number" name="stok" value="{{$products->stok}}" autocomplete="on" id="modal-stok-produk" />
                            <div class="invalid-tooltip">Masukkan Stok Produk Dahulu</div>
                        </div>
                        <div class="mb-3 col-sm-6 position-relative">
                            <label for="Jenis">Jenis</label>
                            <select class="form-select" name="jenis" id="validationTooltip04" required="">
                                <option selected="" disabled="" value="">Choose...</option>
                                <option value="Dus">Dus</option>
                                <option value="Kilogram">Kg</option>
                                <option value="Satuan">Satuan</option>

                            </select>
                            <div class="invalid-tooltip">Pilih Jenis Dahulu</div>
                        </div>
                        <div class="mb-3 col-sm-6 position-relative">
                            <label class="form-label" for="modal-harga-modal">Harga (Modal)</label>
                            <input min="0" class="form-control" required="" placeholder="Masukkan Harga Modal"
                                type="number" name="harga_modal" value="{{$products->harga_modal}}" autocomplete="on" id="modal-harga-modal" />
                            <div class="invalid-tooltip">Masukkan Harga Modal</div>
                        </div>
                        <div class="mb-3 col-sm-6 position-relative">
                            <label class="form-label" for="modal-harga-produk">Harga Jual (*per jenis)</label>
                            <input class="form-control" required="" min="0" value="{{$products->harga}}" placeholder="Masukkan Harga Jual Produk"
                                type="number" name="harga" autocomplete="on" id="modal-harga-produk" />
                            
                            <div class="invalid-tooltip">Masukkan Harga Jual Produk Dahulu</div>
                        </div>
                        <small><i><strong>*Note : Input Harga Tidak menggunakan titik/koma</strong></i></small>
                        
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection