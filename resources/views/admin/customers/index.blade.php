@extends('layouts.template')
@section('title_page')
Customer
@endsection
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Pelanggan</li>
@endsection
@section('content')
<div class="col-xxl-9 col-md-12">
    <div class="card z-index-1" id="categoryTable"
        data-list='{"valueNames":["nama", "total_belanja"],"page":5,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">List Data Produk</h5>
                </div>
                <div class="search-box" data-list='{"valueNames":["title"]}'>
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
                        data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                        <div class="table-responsive scrollbar">
                            <table class="table table-bordered table-striped fs--1 mb-0">
                                <thead class="bg-200 text-900">
                                    <tr>
                                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="nama">Nama Pelanggan</th>
                                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="total_belanja">Total Belanja</th>
                                        <th class="no-sort pe-1 align-middle white-space-nowrap data-table-row-action text-center">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @forelse($customer as $val)
                                    <tr class="btn-reveal-trigger">
                                        <th class="align-middle white-space-nowrap nama">{{$val->nama}}</th>
                                        <th class="align-middle white-space-nowrap total_belanja">Rp. {{Str::currency($val->total_belanja)}}</th>
                                        

                                            <td class="align-middle white-space-nowrap text-end">
                                                <div class="dropstart font-sans-serif position-static d-inline-block">
                                                    <button
                                                        class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end"
                                                        type="button" id="dropdown13" data-bs-toggle="dropdown"
                                                        data-boundary="window" aria-haspopup="true"
                                                        aria-expanded="false" data-bs-reference="parent"><span
                                                            class="fas fa-ellipsis-h fs--1"></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                                        aria-labelledby="dropdown13"><a class="dropdown-item"
                                                            href="{{route('customers.show', Crypt::encrypt($val->id))}}">History Pembelian</a><a class="dropdown-item"
                                                            href="{{route('customers.edit', Crypt::encrypt($val->id))}}">Edit</a>
                                                        <div class="dropdown-divider"></div>

                                                        <form action="{{ route('customers.destroy', $val->id) }}"
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
    <div class="modal-dialog modal-md mt-6" role="document">
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
                <form class="needs-validation" novalidate="" method="post" action="{{route('customers.store')}}">
                    @csrf
                    <div class="row gx-2">
                        <div class="mb-3 col-sm-12 position-relative">
                            <label class="form-label" for="modal-nama">Nama Pelanggan</label>
                            <input class="form-control" required="" placeholder="Masukkan Nama Pelanggan"
                                type="nama" name="nama" autocomplete="on" id="modal-nama" />
                            <div class="invalid-tooltip">Masukkan Nama Pelanggan Dahulu</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
</script>
@endsection