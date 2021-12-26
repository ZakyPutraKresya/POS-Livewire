@if (Auth::user()->role == 'admin')
@include('admin.index')
@else
<script>window.location = "/cart";</script>
@endif