@extends('layouts.template')
@section('title_page')
Product
@endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('product.index')}}">Produk</a></li>
<li class="breadcrumb-item active" aria-current="page">Stok</li>
@endsection
@section('content')
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#error-modal">Launch demo
    modal</button>


@endsection