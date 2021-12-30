@extends('layouts.template')
@section('title_page')
Login
@endsection
@section('layoutlogin')
<div class="row min-vh-100 flex-center g-0">

    <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape"
            src="{{asset('template')}}/assets/img/icons/spot-illustrations/bg-shape.png" alt="" width="250"><img
            class="bg-auth-circle-shape-2" src="{{asset('template')}}/assets/img/icons/spot-illustrations/shape-1.png"
            alt="" width="150">

        <div class="card overflow-hidden z-index-1">
            <div class="card-body p-0">
                <div class="row g-0 h-100">
                    <div class="col-md-5 text-center bg-card-gradient">
                        <div class="position-relative p-4 pt-md-5 pb-md-7 light">
                            <div class="bg-holder bg-auth-card-shape"
                                style="background-image:url({{asset('template')}}/assets/img/icons/spot-illustrations/half-circle.png);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="z-index-1 position-relative"><a
                                    class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder"
                                    href="{{asset('template')}}/index.html">Toko Sarah</a>
                                <p class="opacity-75 text-white">With the power of Falcon, you can now focus only on
                                    functionaries for your digital products, while leaving the UI design on us!</p>
                            </div>
                        </div>
                        <div class="mt-3 mb-4 mt-md-4 mb-md-5 light">
                            <p class="mb-0 mt-4 mt-md-5 fs--1 fw-semi-bold text-white opacity-75">Read our <a
                                    class="text-decoration-underline text-white" href="#!">terms</a> and <a
                                    class="text-decoration-underline text-white" href="#!">conditions </a></p>
                        </div>
                    </div>

                    <div class="col-md-7 d-flex flex-center">
                        <div class="p-4 p-md-5 flex-grow-1">
                            <div class="row flex-between-center">
                                <div class="col-auto">
                                    <h3>Account Login</h3>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                                <div class="bg-success me-3 icon-item"><span
                                        class="fas fa-check-circle text-white fs-3"></span></div>
                                <p class="mb-0 flex-1">{{ $message }}</p>
                                <button class="btn-close" type="button" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            
                            <form class="needs-validation" novalidate="" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="validationTooltipUsername">Username</label>
                                    <div class="input-group">
                                        <input placeholder="Masukkan Username" class="form-control @error('username') is-invalid @enderror" id="validationTooltipUsername" type="text"
                                            aria-describedby="validationTooltipUsernamePrepend" required=""  name="username"/>
                                        
                                        <div class="invalid-tooltip">Masukkan Username Terlebih Dahulu.</div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="validationTooltipPassword">Password</label>
                                    <div class="input-group">
                                        <input placeholder="Masukkan Password" class="form-control @error('password') is-invalid @enderror"
                                            id="validationTooltipPassword" name="password" type="password"
                                            aria-describedby="validationTooltipPasswordPrepend" required="" />
                                        <div class="invalid-tooltip">Masukkan Password Terlebih Dahulu.</div>
                                    </div>
                                </div>
                                <div class="row flex-between-center">
                                    <div class="col-auto">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" id="card-checkbox"
                                                checked="checked" />
                                            <label class="form-check-label mb-0" for="card-checkbox">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-auto"><a class="fs--1"
                                            href="{{asset('template')}}/pages/authentication/card/forgot-password.html">Forgot
                                            Password?</a></div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log
                                        in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection