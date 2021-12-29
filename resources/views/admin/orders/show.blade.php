@extends('layouts.template')
@section('title_page')
Order Detail
@endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('orders.index')}}">Order</a></li>
<li class="breadcrumb-item active" aria-current="page">Detail</li>
@endsection
@section('content')
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card"
        style="background-image:url(../../../assets/img/icons/spot-illustrations/corner-4.png);opacity: 0.7;">
    </div>
    <!--/.bg-holder-->

    <div class="card-body position-relative">
        <h5>Order Details: #{{$resi}}</h5>
        <p class="fs--1">{{$tgl_beli->tanggal_pembelian}}</p>
        <div><strong class="me-2">Status: </strong>
            <div class="badge rounded-pill badge-soft-success fs--2">Completed<span class="fas fa-check ms-1"
                    data-fa-transform="shrink-2"></span></div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="table-responsive fs--1">
            <table class="table table-striped border-bottom">
                <thead class="bg-200 text-900">
                    <tr>
                        <th class="border-0">Produk</th>
                        <th class="border-0 text-center">Quantity</th>
                        <th class="border-0 text-end">Harga</th>
                        <th class="border-0 text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="border-200">
                        <td class="align-middle">
                            <h6 class="mb-0 text-nowrap">{{$order->product->nama}}</h6>
                        </td>
                        <td class="align-middle text-center">{{$order->jumlah}}</td>
                        <td class="align-middle text-end">Rp. {{Str::currency($order->harga_beli)}}</td>
                        <?php
                        $subtotal = $order->harga_beli * $order->jumlah;
                        
                        ?>
                        <td class="align-middle text-end">Rp. {{Str::currency($subtotal)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row g-0 justify-content-end">
            <div class="col-auto">
                <table class="table table-sm table-borderless fs--1 text-end">
                    <?php
                    $totalnya = 0;
                    foreach($orders as $ord){
                        $totalnya += $ord->harga_beli * $ord->jumlah;
                    }
                    ?>
                    <tr>
                      <th class="text-900">Subtotal:</th>
                      <td class="fw-semi-bold">Rp. {{Str::currency($totalnya)}}</td>
                    </tr>
                    @if($tgl_beli->jenis_diskon == 'Persentase')
                    <tr>
                      <th class="text-900">Discount {{$tgl_beli->jumlah_diskon}}%:</th>
                      <?php
                        $cekdisc = $totalnya / 100 * $tgl_beli->jumlah_diskon;
                      ?>
                      <td class="fw-semi-bold">Rp. {{Str::currency($cekdisc)}}</td>
                    </tr>
                    @endif
                    @if($tgl_beli->jenis_diskon == 'Rupiah')
                    <tr>
                      <th class="text-900">Discount ({{$tgl_beli->jenis_diskon}}):</th>
                      <td class="fw-semi-bold">Rp. {{Str::currency($tgl_beli->jumlah_diskon)}}</td>
                    </tr>
                    @endif
                    @if($tgl_beli->jenis_diskon == 'Tanpa Diskon')
                    <tr>
                      <th class="text-900">Discount :</th>
                      <td class="fw-semi-bold">{{$tgl_beli->jumlah_diskon}}</td>
                    </tr>
                    @endif
                    <tr class="border-top">
                        <th class="text-900">Grand Total:</th>
                        <td class="fw-semi-bold">Rp. {{Str::currency($tgl_beli->total_harga)}}</td>
                    </tr>
                </table>
                <small><strong>*Note : Jika Harga tidak sesuai, Berarti ada Produk yang dihapus/diubah</strong></small>
            </div>
        </div>
    </div>
</div>
@endsection