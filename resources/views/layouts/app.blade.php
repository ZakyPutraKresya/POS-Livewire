<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Toko Sarah</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logos/squanchy.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/logos/squanchy.jpg">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logos/squanchy.jpg">
    <!-- jQuery -->
    <!-- Bootstrap4 files-->
<link href="{{ asset('template')}}/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/ui.css" rel="stylesheet" type="text/css" />
    <link href="assets/fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
    <link href="assets/css/OverlayScrollbars.css" type="text/css" rel="stylesheet" />
    <link href="{{ asset('template')}}/vendors/choices/choices.min.css" rel="stylesheet" />
    <!-- Font awesome 5 -->
    <style>
        .avatar {
            vertical-align: middle;
            width: 35px;
            height: 35px;
            border-radius: 50%;
        }

        .bg-default,
        .btn-default {
            background-color: #f2f3f8;
        }

        .btn-error {
            color: #ef5f5f;
        }
    </style>
    @livewireStyles
    <!-- custom style -->
</head>

<body>
    <section class="header-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="brand-wrap">
                        <img class="logo" src="a.jpg">
                        <h2 class="logo-text">Toko Sarah</h2>
                    </div> <!-- brand-wrap.// -->
                </div>
                @yield('search') <!-- col.// -->
                <div class="col-lg-6 col-sm-6">
                    <div class="widgets-wrap d-flex justify-content-end">
                        <div class="widget-header">
                            <a href="#" class="icontext">
                                <a href="#" class="btn btn-primary m-btn m-btn--icon m-btn--icon-only">
                                    <i class="fa fa-home"></i>
                                </a>
                            </a>
                        </div> <!-- widget .// -->
                        <div class="widget-header dropdown">
                            <a href="#" class="ml-3 icontext" data-toggle="dropdown" data-offset="20,10">
                                <img src="a.png" class="avatar" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('logout')}}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="fa fa-sign-out-alt"></i> Logout</a>
                            <form action="{{route('logout')}}" method="post" id="logout-form">
                                @csrf
                            </form>
                            </div> <!--  dropdown-menu .// -->
                        </div> <!-- widget  dropdown.// -->
                    </div> <!-- widgets-wrap.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section>
    @livewire('cart');
    <script src="assets/js/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="{{ asset('template')}}/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="assets/js/OverlayScrollbars.js" type="text/javascript"></script>
    <script src="assets/js/auto-titik.js" type="text/javascript"></script>
    <script>
        $(function () {
            //The passed argument has to be at least a empty object or a object with your desired options
            //$("body").overlayScrollbars({ });
            $("#items").height(552);
            $("#items").overlayScrollbars({
                overflowBehavior: {
                    x: "hidden",
                    y: "scroll"
                }
            });
            $("#cart").height(445);
            $("#cart").overlayScrollbars({});
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('swal', function(e){
            Swal.fire(e.detail);
        });
    </script>
    <!-- <script>
        window.addEventListener('tambah-diskon', event =>{
            $('#tambah-diskon').modal('show');
        });
    </script> -->
    <script src="{{ asset('template')}}/vendors/choices/choices.min.js"></script>
    <script>
        $('#checkout').on('shown.bs.modal', function () {
            $('#inputku').focus();
        })
    </script>
<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->

<script src="{{ asset('template')}}/vendors/bootstrap/bootstrap.min.js"></script>
<script src="{{ asset('template')}}/vendors/anchorjs/anchor.min.js"></script>
<script src="{{ asset('template')}}/vendors/lodash/lodash.min.js"></script>
<script src="{{ asset('template')}}/vendors/list.js/list.min.js"></script>
<script src="{{ asset('template')}}/assets/js/theme.js"></script>
    @livewireScripts
</body>

</html>