@if (Auth::user()->role == 'admin')
<script>window.location = "/admin/dashboard";</script>
@else
<script>window.location = "/cart";</script>
@endif