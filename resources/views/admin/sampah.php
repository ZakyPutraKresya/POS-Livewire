<form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>






                    <div class="card-body px-0 py-0">
            <div class="table-responsive scrollbar">
                <table class="table table-sm fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">

                        <tr>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="nama">Nama Produk</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="harga">Harga</th>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="stok">Stok</th>
                            <th class="sort pe-1 align-middle white-space-nowrap text-center" data-sort="kategori">
                                Kategori</th>
                            <th class="no-sort pe-1 align-middle data-table-row-action"></th>
                        </tr>

                    </thead>
                    <tbody class="list" id="table-purchase-body">
                        @forelse($product as $produk)
                        <tr class="btn-reveal-trigger">
                            <th class="align-middle white-space-nowrap nama">{{$produk->nama}}</a></th>
                            <td class="align-middle white-space-nowrap harga">{{$produk->harga}}</td>
                            <td class="align-middle white-space-nowrap stok">{{$produk->stok}}</td>
                            <td class="align-middle text-end kategori">{{$produk->category->kategori}}</td>
                            <td class="align-middle white-space-nowrap text-end">
                                <div class="dropstart font-sans-serif position-static d-inline-block">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end"
                                        type="button" id="dropdown13" data-bs-toggle="dropdown" data-boundary="window"
                                        aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span
                                            class="fas fa-ellipsis-h fs--1"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                        aria-labelledby="dropdown13"><a class="dropdown-item" href="#!">View</a><a
                                            class="dropdown-item" href="#!">Edit</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                            href="#!">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="btn-reveal-trigger">
                            <th class="align-middle white-space-nowrap nama" colspan="5">
                                <div class="row g-3 mb-3">
                                    <div class="col-xxl-9">
                                        <div class="card bg-light my-3">
                                            <div class="card-body p-3 text-center">
                                                <p class="fs--1 mb-0"><span class="fas fa-ban me-2"></span>Data Kosong
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>