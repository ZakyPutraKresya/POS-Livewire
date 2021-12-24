@extends('layouts.template')
@section('title_page')
Register
@endsection
@section('layoutlogin')
<main class="main" id="top">
    <div class="container-fluid">
        <div class="row min-vh-100 flex-center g-0">
            <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape"
                    src="../../../assets/img/icons/spot-illustrations/bg-shape.png" alt="" width="250"><img
                    class="bg-auth-circle-shape-2" src="../../../assets/img/icons/spot-illustrations/shape-1.png" alt=""
                    width="150">
                <div class="card overflow-hidden z-index-1">
                    <div class="card-body p-0">
                        <div class="row g-0 h-100">
                            <div class="col-md-5 text-center bg-card-gradient">
                                <div class="position-relative p-4 pt-md-5 pb-md-7 light">
                                    <div class="bg-holder bg-auth-card-shape"
                                        style="background-image:url(../../../assets/img/icons/spot-illustrations/half-circle.png);">
                                    </div>
                                    <!--/.bg-holder-->

                                    <div class="z-index-1 position-relative"><a
                                            class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder"
                                            href="../../../index.html">falcon</a>
                                        <p class="opacity-75 text-white">With the power of Falcon, you can now focus
                                            only on functionaries for your digital products, while leaving the UI design
                                            on us!</p>
                                    </div>
                                </div>
                                <div class="mt-3 mb-4 mt-md-4 mb-md-5 light">
                                    <p class="pt-3 text-white">Have an account?<br><a
                                            class="btn btn-outline-light mt-2 px-4" href="{{route('login')}}">Log In</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-7 d-flex flex-center">
                                <div class="p-4 p-md-5 flex-grow-1">
                                    <h3>Register</h3>
                                    @if ($message = Session::get('error'))
                                    <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                                        <div class="bg-danger me-3 icon-item"><span
                                                class="fas fa-times-circle text-white fs-3"></span></div>
                                        <p class="mb-0 flex-1">A simple danger alert—check it out!</p>
                                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif

                                    <form class="needs-validation" novalidate="" wire:submit.prevent="store">

                                        <div class="mb-3">
                                            <label class="form-label" for="card-name">Name</label>
                                            <input class="form-control" wire:model.lazy="name" type="text"
                                                autocomplete="on" id="card-name" required="" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="card-email">Email address</label>
                                            <input class="form-control" wire:model.lazy="email" type="email"
                                                autocomplete="on" id="card-email" />
                                        </div>
                                        <div class="mb-3">
                                    <label class="form-label" for="validationTooltipUsername">Username</label>
                                    <div class="input-group">
                                        <input class="form-control "
                                            wire:model.lazy="username" id="validationTooltipUsername" type="text"
                                            aria-describedby="validationTooltipUsernamePrepend" required="" />
                                        <div class="invalid-tooltip">Masukkan Username Terlebih Dahulu.</div>
                                    </div>
                                </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="card-role">Role</label>
                                            <input class="form-control" wire:model.lazy="role" type="role"
                                                autocomplete="on" id="card-role" />
                                        </div>
                                        <div class="row gx-2">
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label" for="card-password">Password</label>
                                                <input class="form-control" wire:model.lazy="password" type="password"
                                                    autocomplete="on" id="card-password" />
                                            </div>
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label" for="card-confirm-password">Confirm
                                                    Password</label>
                                                <input class="form-control" wire:model.lazy="password_confirmation"
                                                    type="password" autocomplete="on" id="card-confirm-password" />
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary d-block w-100 mt-3" type="submit"
                                                name="submit">Register</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection