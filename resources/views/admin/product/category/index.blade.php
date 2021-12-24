@extends('layouts.template')
@section('title_page')
Category
@endsection
@section('page')
<li class="breadcrumb-item active" aria-current="page">Kategori</li>
@endsection
@section('content')

<div class="col-xxl-9 col-md-12">
    <div class="card z-index-1" id="productTable"
        data-list='{"valueNames":["kategori"],"page":5,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">List Data Produk</h5>
                </div>
                <div class="search-box" data-list='{"valueNames":["kategori"]}'>
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input fuzzy-search" type="search" placeholder="Search..."
                            aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                    <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none"
                        data-bs-dismiss="search">
                        <div class="btn-close-falcon" aria-label="Close"></div>
                    </div>

                </div>
                <div class="col-6 col-sm-auto ms-auto text-end ps-0">

                    <div id="table-purchases-replace-element">


                        <a class="btn btn-primary btn-sm" href="#tambah-data" data-bs-toggle="modal"><span
                                class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span><span
                                class="d-none d-sm-inline-block ms-1">Tambah</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                    aria-labelledby="tab-dom-55d552bf-cdbd-40f9-856d-410188578fda"
                    id="dom-55d552bf-cdbd-40f9-856d-410188578fda">
                    <div id="tableExample2"
                        data-list='{"valueNames":["kategori"],"page":5,"pagination":true}'>
                        <div class="table-responsive scrollbar">
                            <table class="table table-bordered table-striped fs--1 mb-0">
                                <thead class="bg-200 text-900">
                                    <tr>
                                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="kategori">Nama Kategori</th>
                                        <th
                                            class="no-sort pe-1 align-middle white-space-nowrap data-table-row-action text-center">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @forelse($category as $kategori)
                                    <tr class="btn-reveal-trigger">
                                        <th class="align-middle white-space-nowrap kategori">{{$kategori->kategori}}</a></th>

                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block">
                                                <button
                                                    class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end"
                                                    type="button" id="dropdown13" data-bs-toggle="dropdown"
                                                    data-boundary="window" aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                                    aria-labelledby="dropdown13"><button class="dropdown-item detailBtn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#detailProduk{{$kategori->id}}"
                                                        data-id="{{$kategori->id}}">View</button><a class="dropdown-item"
                                                        href="{{route('product.edit', Crypt::encrypt($kategori->id))}}">Edit</a>
                                                    <div class="dropdown-divider"></div>

                                                    <form action="{{ route('product.destroy', $kategori->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button onclick="return confirm('Are you sure?')"
                                                            class="dropdown-item text-danger"> &nbsp;Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="btn-reveal-trigger">
                                        <th class="align-middle white-space-nowrap nama" colspan="6">
                                            <div class="row g-3 mb-3">
                                                <div class="col-xxl-9">
                                                    <div class="card bg-light my-3">
                                                        <div class="card-body p-3 text-center">
                                                            <p class="fs--1 mb-0"><span
                                                                    class="fas fa-ban me-2"></span>Data Kosong
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous"
                                data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                            <ul class="pagination mb-0"></ul>
                            <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next"
                                data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg mt-6" role="document">
        <div class="modal-content border-0">
            <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                    <h4 class="mb-0 text-white" id="authentication-modal-label">Tambah Data</h4>
                    <p class="fs--1 mb-0 text-white">Tolong pastikan semua Data ter-isi</p>
                </div>
                <button class="btn-close btn-close-white position-absolute top-2 end-0 me-2" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body py-4 px-5">
                <form class="needs-validation" novalidate="" method="post" action="{{route('product.store')}}">
                    @csrf
                    <div class="row gx-2">
                        <div class="mb-3 col-sm-6 position-relative">
                            <label class="form-label" for="modal-nama-produk">Nama Produk</label>
                            <input class="form-control" required="" placeholder="Masukkan Nama Produk"
                                type="nama-produk" name="nama" autocomplete="on" id="modal-nama-produk" />
                            <div class="invalid-tooltip">Masukkan Nama Produk Dahulu</div>
                        </div>
                        <div class="mb-3 col-sm-6 position-relative">
                            <label for="Kategori">Kategori</label>
                            <select class="form-select" name="kategori_id" id="validationTooltip04" required="">
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
                                type="number" name="stok" autocomplete="on" id="modal-stok-produk" />
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
                                type="number" name="harga_modal" autocomplete="on" id="modal-harga-modal" />
                            <div class="invalid-tooltip">Masukkan Harga Modal</div>
                        </div>
                        <div class="mb-3 col-sm-6 position-relative">
                            <label class="form-label" for="modal-harga-produk">Harga Jual (*per jenis)</label>
                            <input class="form-control" required="" min="0" placeholder="Masukkan Harga Jual Produk"
                                type="number" name="harga" autocomplete="on" id="modal-harga-produk" />

                            <div class="invalid-tooltip">Masukkan Harga Jual Produk Dahulu</div>
                        </div>
                        <small><i><strong>*Note : Input Harga Tidak menggunakan titik/koma</strong></i></small>

                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection