<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Toko Sarah</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets')}}/images/logos/squanchy.jpg">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets')}}/images/logos/squanchy.jpg">
    <!-- jQuery -->
    <!-- Bootstrap4 files-->
    <link href="{{ asset('assets')}}/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets')}}/css/ui.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets')}}/css/OverlayScrollbars.css" type="text/css" rel="stylesheet" />
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
    @include('layouts.plugins')
    <!-- custom style -->
</head>

<body>

    @include('layouts.navbar2')
    @yield('content')

    <!-- ========================= SECTION CONTENT END// ========================= -->
    <script src="{{ asset('assets')}}/js/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets')}}/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets')}}/js/OverlayScrollbars.js" type="text/javascript"></script>
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
    <script>
        var isFluid = JSON.parse(localStorage.getItem('isFluid'));
        if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
        }
    </script>
    @include('sweetalert::alert')
    @yield('scripts')
    <script type="text/javascript">
    $(".update-cart").change(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('edit.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('remove.from.cart') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id")
            },
            success: function (response) {
                window.location.reload();
            }
        });

    });
    </script>
</body>

</html>


<input type="text" id="inputku" name="angkab" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" autofocus>