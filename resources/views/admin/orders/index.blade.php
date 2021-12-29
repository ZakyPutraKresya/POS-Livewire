@extends('layouts.template')
@section('title_page')
Orders
@endsection
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Order</li>
@endsection
@section('content')
<div class="row g-3 mb-3">
    <div class="col-xxl-6 col-xl-12">
        <div class="row g-3">
            <div class="col-12">
                <div class="card bg-transparent-50 overflow-hidden">
                    <div class="card-header position-relative">
                        <div class="bg-holder d-none d-md-block bg-card z-index-1"
                            style="background-image:url({{asset('template')}}/assets/img/illustrations/ecommerce-bg.png);background-size:230px;background-position:right bottom;z-index:-1;">
                        </div>
                        <!--/.bg-holder-->

                        <div class="position-relative z-index-2">
                            <div>
                                <h3 class="text-primary mb-1" style="text-transform: capitalize;">{{$jam}},
                                    {{Auth::user()->name}}!</h3>
                                <p>Report Total Penjualan Barang dan Penghasilan Selama 1 Minggu </p>
                            </div>
                            <div class="d-flex py-3">
                                <div class="pe-3">
                                    <p class="text-600 fs--1 fw-medium">Penjualan</p>
                                    <h4 class="text-800 mb-0">{{Str::currency($penjualanBarang)}}</h4>
                                </div>
                                <div class="ps-3">
                                    <p class="text-600 fs--1">Penghasilan (Kotor)</p>
                                    <h4 class="text-800 mb-0">Rp. {{Str::currency($pendapatanKotor)}} </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xxl-9 col-md-12">
    <div class="card z-index-1" id="categoryTable" data-list='{"valueNames":["order_id","customer_id","total_harga","tanggal_pembelian"],"page":5,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-12 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">List Data Order</h5>
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
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                    aria-labelledby="tab-dom-55d552bf-cdbd-40f9-856d-410188578fda"
                    id="dom-55d552bf-cdbd-40f9-856d-410188578fda">
                    <div id="tableExample2"
                        data-list='{"valueNames":["order_id","customer_id","total_harga","tanggal_pembelian"],"page":5,"pagination":true}'>
                        <div class="table-responsive scrollbar">
                            <table class="table table-bordered table-striped fs--1 mb-0">
                                <thead class="bg-200 text-900">
                                    <tr>
                                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order_id">
                                            OrderID</th>
                                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="customer_id">
                                            Customer</th>
                                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="total_harga">
                                            Total</th>
                                        <th class="sort pe-1 align-middle white-space-nowrap"
                                            data-sort="tanggal_pembelian">Tgl Pembelian</th>
                                        <th
                                            class="no-sort pe-1 align-middle white-space-nowrap data-table-row-action text-center">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @forelse($orders as $order)
                                    <tr class="btn-reveal-trigger">
                                        <th class="align-middle white-space-nowrap order_id">{{$order->order_id}}</a></th>
                                        <td class="align-middle white-space-nowrap customer_id">{{$order->customer->nama}}</td>
                                        <td class="align-middle white-space-nowrap total_harga">Rp. {{Str::currency($order->total_harga)}}</td>
                                        <td class="align-middle white-space-nowrap tanggal_pembelian">{{$order->tanggal_pembelian}}</td>


                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block">
                                                <button
                                                    class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end"
                                                    type="button" id="dropdown13" data-bs-toggle="dropdown"
                                                    data-boundary="window" aria-haspopup="true" aria-expanded="false"
                                                    data-bs-reference="parent"><span
                                                        class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                                    aria-labelledby="dropdown13"><a class="dropdown-item detailBtn"
                                                        href="{{route('orders.show', $order->order_id)}}"
                                                        data-id="">View</a>
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


<script type="text/javascript">
</script>
@endsection