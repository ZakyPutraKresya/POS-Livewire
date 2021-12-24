
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y-sm bg-default ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 card padding-y-sm card ">
                <div class="search-box mb-3" data-list='{"valueNames":["title"]}'>
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static" action="/search" method="get">
                        <input class="form-control search-input fuzzy-search" type="search" name="search" placeholder="Cari Produk..."
                            aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                    <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none"
                        data-bs-dismiss="search">
                        <div class="btn-close-falcon" aria-label="Close"></div>
                    </div>

                </div>
                <span id="items">
                    <div class="row">
                        @foreach($data as $dt => $val)
                        <div class="col-md-4">
                            <figure class="card card-product" role="tabpanel"
                                aria-labelledby="tab-dom-55d552bf-cdbd-40f9-856d-410188578fda"
                                id="dom-55d552bf-cdbd-40f9-856d-410188578fda">
                                <figcaption class="info-wrap" data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                                    <a href="#" class="title">{{$val->nama}}</a>
                                    <div class="action-wrap">
                                        @if($val->stok == 0)
                                        <button class="btn btn-danger btn-sm float-right" disabled> <i
                                                class="fas fa-ban"></i> Habis </button>
                                        @else
                                        <button class="btn btn-primary btn-sm float-right"> <i
                                                class="fa fa-cart-plus"></i> Add </button>
                                        @endif
                                        <div class="price-wrap h5">
                                            <span class="price-new">Rp. {{Str::currency($val->harga)}}</span>
                                        </div> <!-- price-wrap.// -->

                                    </div> <!-- action-wrap -->
                                </figcaption>
                            </figure> <!-- card // -->
                        </div> <!-- col // -->
                        @endforeach
                    </div> <!-- row.// -->
                </span>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <span id="cart">
                        <table class="table table-hover shopping-cart-wrap">
                            <thead class="text-muted">
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col" width="120">Qty</th>
                                    <th scope="col" width="120">Price</th>
                                    <th scope="col" class="text-right" width="200">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap"><img src="{{ asset('assets')}}/images/items/1.jpg"
                                                    class="img-thumbnail img-xs"></div>
                                            <figcaption class="media-body">
                                                <h6 class="title text-truncate">Product name </h6>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td class="text-center">
                                        <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group"
                                            aria-label="...">
                                            <button type="button" class="m-btn btn btn-default"><i
                                                    class="fa fa-minus"></i></button>
                                            <button type="button" class="m-btn btn btn-default" disabled>3</button>
                                            <button type="button" class="m-btn btn btn-default"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">$145</var>
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-right">
                                        <a href="" class="btn btn-outline-danger"> <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap"><img src="{{ asset('assets')}}/images/items/5.jpg"
                                                    class="img-thumbnail img-xs"></div>
                                            <figcaption class="media-body">
                                                <h6 class="title text-truncate">Product name </h6>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td class="text-center">
                                        <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group"
                                            aria-label="...">
                                            <button type="button" class="m-btn btn btn-default"><i
                                                    class="fa fa-minus"></i></button>
                                            <button type="button" class="m-btn btn btn-default" disabled>1</button>
                                            <button type="button" class="m-btn btn btn-default"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">$35</var>
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-right">
                                        <a href="" class="btn btn-outline-danger btn-round"> <i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap"><img src="{{ asset('assets')}}/images/items/4.jpg"
                                                    class="img-thumbnail img-xs"></div>
                                            <figcaption class="media-body">
                                                <h6 class="title text-truncate">Product name </h6>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td class="text-center">
                                        <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group"
                                            aria-label="...">
                                            <button type="button" class="m-btn btn btn-default"><i
                                                    class="fa fa-minus"></i></button>
                                            <button type="button" class="m-btn btn btn-default" disabled>5</button>
                                            <button type="button" class="m-btn btn btn-default"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">$45</var>
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-right">
                                        <a href="" class="btn btn-outline-danger btn-round"> <i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap"><img src="{{ asset('assets')}}/images/items/2.jpg"
                                                    class="img-thumbnail img-xs"></div>
                                            <figcaption class="media-body">
                                                <h6 class="title text-truncate">Product name </h6>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td class="text-center">
                                        <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group"
                                            aria-label="...">
                                            <button type="button" class="m-btn btn btn-default"><i
                                                    class="fa fa-minus"></i></button>
                                            <button type="button" class="m-btn btn btn-default" disabled>2</button>
                                            <button type="button" class="m-btn btn btn-default"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">$45</var>
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-right">
                                        <a href="" class="btn btn-outline-danger btn-round"> <i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap"><img src="{{ asset('assets')}}/images/items/3.jpg"
                                                    class="img-thumbnail img-xs"></div>
                                            <figcaption class="media-body">
                                                <h6 class="title text-truncate">Product name </h6>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td class="text-center">
                                        <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group"
                                            aria-label="...">
                                            <button type="button" class="m-btn btn btn-default"><i
                                                    class="fa fa-minus"></i></button>
                                            <button type="button" class="m-btn btn btn-default" disabled>1</button>
                                            <button type="button" class="m-btn btn btn-default"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">$45</var>
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-right">
                                        <a href="" class="btn btn-outline-danger btn-round"> <i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </span>
                </div> <!-- card.// -->
                <div class="box">
                    <dl class="dlist-align">
                        <dt>Tax: </dt>
                        <dd class="text-right">12%</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Discount:</dt>
                        <dd class="text-right"><a href="#">0%</a></dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Sub Total:</dt>
                        <dd class="text-right">$215</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Total: </dt>
                        <dd class="text-right h4 b"> $215 </dd>
                    </dl>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn  btn-default btn-error btn-lg btn-block"><i
                                    class="fa fa-times-circle "></i> Cancel </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn  btn-primary btn-lg btn-block"><i class="fa fa-shopping-bag"></i>
                                Charge </a>
                        </div>
                    </div>
                </div> <!-- box.// -->
            </div>
        </div>
    </div><!-- container //  -->
</section>