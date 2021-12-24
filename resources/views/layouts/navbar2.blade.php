<section class="header-main">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="brand-wrap">
                    <img class="logo" src="{{ asset('assets')}}/images/logos/squanchy.jpg">
                    <h2 class="logo-text">Toko Sarah</h2>
                </div> <!-- brand-wrap.// -->
            </div>
            <div class="col-lg-6">
                <div class="widgets-wrap d-flex justify-content-end">
                    <div class="widget-header">
                        <a href="#" class="icontext">
                            <a href="#" class="btn btn-primary m-btn m-btn--icon m-btn--icon-only">
                                <i class="fa fa-home"></i>
                            </a>
                        </a>
                    </div> <!-- widget .// -->
                    <div class="widget-header dropdown">
                        <a href="#" class="icontext">
                            <a href="#" class="btn btn-info m-btn m-btn--icon m-btn--icon-only" data-toggle="dropdown" data-offset="20,10">
                                <i class="fas fa-user"></i>
                            </a>
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