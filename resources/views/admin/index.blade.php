@extends('layouts.template')
@section('title_page')
Admin Dashboard
@endsection
@section('breadcrumbs')

@endsection
@section('content')
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-md-4">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6>Pelanggan Terdaftar</h6>
                <div class="display-4 fs-3 mb-3 fw-normal font-sans-serif text-warning">{{Str::currency($hitungCustomer)}}</div><a
                    class="fw-semi-bold fs--1 text-nowrap" href="{{route('customers.index')}}">Lihat Semua<span
                        class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-2.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6>Produk Terjual
                    @if($persenOrderan <= 0)
                    <span class="badge badge-soft-danger rounded-pill ms-2">{{Str::currency($persenOrderan)}}%</span>
                    @endif
                    @if($persenOrderan >= 1)
                    <span class="badge badge-soft-info rounded-pill ms-2">{{Str::currency($persenOrderan)}}%</span>
                    @endif
                </h6>
                <div class="display-4 fs-3 mb-3 fw-normal font-sans-serif text-info">{{Str::currency($hitungOrderHariIni)}}</div><a
                    class="fw-semi-bold fs--1 text-nowrap" href="{{route('orders.index')}}">Semua Order<span
                        class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-3.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body position-relative">
                <h6>Pendapatan
                    @if($persenPendapatan <= 0)
                    <span class="badge badge-soft-danger rounded-pill ms-2">{{Str::currency($persenPendapatan)}}%</span>
                    @endif
                    @if($persenPendapatan >= 1)
                    <span class="badge badge-soft-success rounded-pill ms-2">{{Str::currency($persenPendapatan)}}%</span>
                    @endif
                </h6>
                <div class="display-4 fs-3 mb-3 fw-normal font-sans-serif">Rp. {{Str::currency($keuntunganHariIni)}}</div><span class="fw-semi-bold fs--1 text-nowrap">Perhari</span>
            </div>
        </div>
    </div>
</div>
@endsection