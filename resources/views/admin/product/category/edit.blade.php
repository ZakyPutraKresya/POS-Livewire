@extends('layouts.template')
@section('title_page')
Kategori
@endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('category.index')}}">Kategori</a></li>
<li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0" data-anchor="data-anchor">Ubah Data Kategori</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel"
                aria-labelledby="tab-dom-f6012467-4a1f-4b44-baf9-8005e8007fac"
                id="dom-f6012467-4a1f-4b44-baf9-8005e8007fac">
                <form class="needs-validation" novalidate="" method="post" action="{{route('category.update', $category->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row gx-2">
                        <div class="mb-3 col-sm-12 position-relative">
                            <label class="form-label" for="modal-nama-produk">Nama Kategori</label>
                            <input class="form-control" required="" placeholder="Masukkan Nama Kategori"
                                type="nama-produk" name="kategori" value="{{$category->kategori}}" autocomplete="on" id="modal-nama-produk" />
                            <div class="invalid-tooltip">Masukkan Nama Kategori Dahulu</div>
                        </div>
                        
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