<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--    Document Title-->
    <!-- ===============================================-->
    <title>@yield('title_page')</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <!-- ===============================================-->
    <!--    CSS dan JavaScripts  -->
    <!-- ===============================================-->
    @guest
    @include('layouts.loginApp')
    @endguest
    @auth
    @if (Auth::user()->role == 'admin')
    @include('layouts.plugins')
    @endif
    @endauth
</head>

<body>

    @auth
    @if (Auth::user()->role == 'admin')
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>
            @include('layouts.sidebar')

            <div class="content">

                @include('layouts.navbar')
                <nav style="--falcon-breadcrumb-divider: '»';" class="mt-2 mb-3 ml-1" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        @yield('breadcrumbs')
                    </ol>
                </nav>
                @yield('content')

                @include('layouts.footer')
            </div>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
    @endif
    @endauth
    @guest

    @yield('layoutlogin')

    @endguest
    @include('sweetalert::alert')
</body>

</html>