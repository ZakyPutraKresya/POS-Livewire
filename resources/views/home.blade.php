@if (Auth::user()->role == 'admin')
@include('admin.index')
@else
@include('kasir.index')
@endif