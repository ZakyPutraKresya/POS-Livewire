<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>

        </div><a class="navbar-brand" href="index.html">
            <div class="d-flex align-items-center py-3"><img class="me-2"
                    src="assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span
                    class="font-sans-serif">{{ config('app.name') }}</span>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- parent pages--><a class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}" id="admin-das" href="{{route('home')}}">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-chart-pie"></span></span><span
                                class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                    
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Menu Utama
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link dropdown-indicator" href="#product" role="button"
                        data-bs-toggle="collapse" aria-expanded="false" aria-controls="Produk">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-shopping-bag"></span></span><span
                                class="nav-link-text ps-1">Produk</span>
                        </div>
                    </a>
                    <ul class="nav collapse {{ (request()->is('admin/product*')) ? 'show' : 'false' }}" id="product">
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/product*')) ? 'active' : '' }}" href="{{route('product.index')}}" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">List Data</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/stock')) ? 'active' : '' }}" href="{{route('product.stock')}}" aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Penyesuaian Stok</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <a class="nav-link dropdown-indicator" href="#category" role="button"
                        data-bs-toggle="collapse" aria-expanded="false" aria-controls="Category">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-clipboard-list"></span></span><span
                                class="nav-link-text ps-1">Kategori</span>
                        </div>
                    </a>
                    <ul class="nav collapse {{ (request()->is('product/category*')) ? 'show' : 'false' }}" id="category">
                        <li class="nav-item"><a class="nav-link {{ (request()->is('product/category')) ? 'active' : '' }}" href="{{route('category.index')}}"
                                aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">List Data</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <a class="nav-link dropdown-indicator" href="#order" role="button"
                        data-bs-toggle="collapse" aria-expanded="false" aria-controls="Order">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-shopping-cart"></span></span><span
                                class="nav-link-text ps-1">Orders</span>
                        </div>
                    </a>
                    <ul class="nav collapse {{ (request()->is('orders*')) ? 'show' : 'false' }}" id="order">
                        <li class="nav-item"><a class="nav-link {{ (request()->is('orders*')) ? 'active' : '' }}" href="{{route('orders.index')}}"
                                aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">List Data</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <a class="nav-link dropdown-indicator" href="#customer" role="button"
                        data-bs-toggle="collapse" aria-expanded="false" aria-controls="Order">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-users"></span></span><span
                                class="nav-link-text ps-1">Customers</span>
                        </div>
                    </a>
                    <ul class="nav collapse {{ (request()->is('customers*')) ? 'show' : 'false' }}" id="customer">
                        <li class="nav-item"><a class="nav-link {{ (request()->is('customers*')) ? 'active' : '' }}" href="{{route('customers.index')}}"
                                aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">List Data</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    
                </li>
                
            </ul>
            
        </div>
    </div>
</nav>