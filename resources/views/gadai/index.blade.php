@extends('layouts.global')

@section('title')
    Pegadaian
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-warning rounded" role="alert">
            {{session('success')}}
        </div>
    @endif
    @if(session('fail'))
        <div class="alert alert-danger rounded" role="alert">
            {{session('fail')}}
        </div>
    @endif

    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12">

                <div class="mb-3">
                    <h1>Pegadaian Barang</h1>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="#">Umkm</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Pegadaian Barang</a>
                            </li>
                            {{-- <li class="breadcrumb-item active" aria-current="page">
                                Purchase
                            </li> --}}
                        </ol>
                    </nav>
                </div>

                <div class="row equal-height-container">
                    <div class="col-md-12 col-lg-4 mb-4 col-item">
                        <div class="card">
                            <div
                                class="card-body pt-5 pb-5 d-flex flex-lg-column flex-md-row flex-sm-row flex-column">
                                <div class="price-top-part">
                                    <i class="iconsminds-coins large-icon"></i>
                                    <h5 class="mb-0 font-weight-semibold color-theme-1 mb-4">TRIAL</h5>
                                    <p class="text-large mb-2 text-default">< Rp.5,000,000</p>
                                    {{-- <p class="text-muted text-small">User/Month</p> --}}
                                </div>
                                <div class="pl-3 pr-3 pt-3 pb-0 d-flex price-feature-list flex-column flex-grow-1">
                                    <ul class="list-unstyled">
                                        <li>
                                            <p class="mb-0 ">
                                                Add Product Up to 20
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                                Free 1 year
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                                Not Advertisement
                                            </p>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <p class="text-muted">CLAIMED</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4 mb-4 col-item">
                        <div class="card">
                            <div
                                class="card-body pt-5 pb-5 d-flex flex-lg-column flex-md-row flex-sm-row flex-column">
                                <div class="price-top-part">
                                    <i class="iconsminds-coins large-icon"></i>
                                    <i class="iconsminds-coins large-icon"></i>
                                    <h5 class="mb-0 font-weight-semibold color-theme-1 mb-4">MEMBER</h5>
                                    <p class="text-large mb-2 text-default">< Rp.20,000,000</p>
                                    {{-- <p class="text-muted text-small">User/Month</p> --}}
                                </div>
                                <div class="pl-3 pr-3 pt-3 pb-0 d-flex price-feature-list flex-column flex-grow-1">
                                    <ul class="list-unstyled">
                                        <li>
                                            <p class="mb-0 ">
                                                
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                                Add Product Up to 40
                                            </p>
                                        </li>

                                        <li>
                                            <p class="mb-0 ">
                                                Advertisement
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                               <strong>Get IOT features</strong>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                                Forum support
                                            </p>
                                        </li>
                                    </ul>
                                    {{-- {{$tools->finished_at->format('d')}} --}}
                                    {{-- <div class="text-center">
                                        @if ($roles->role == "member")
                                            <a href="" class="btn btn-primary btn-lg">MEMBER AREA<i
                                                class="simple-icon-arrow-right"></i></a>
                                        @elseif ($roles->role == "super member")
                                            <div class="text-center">
                                                <p class="text-muted">CLAIMED</p>
                                            </div>
                                        @elseif ($roles->role == "trial")
                                            <a href="" class="btn btn-link btn-empty btn-lg">PURCHASE <i
                                                class="simple-icon-arrow-right"></i></a>
                                        @endif                                    
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4 mb-4 col-item">
                        <div class="card">
                            <div
                                class="card-body pt-5 pb-5 d-flex flex-lg-column flex-md-row flex-sm-row flex-column">
                                <div class="price-top-part">
                                    <i class="iconsminds-coins large-icon"></i>
                                    <i class="iconsminds-coins large-icon"></i>
                                    <i class="iconsminds-coins large-icon"></i>
                                    <h5 class="mb-0 font-weight-semibold color-theme-1 mb-4">SUPER MEMBER</h5>
                                    <p class="text-large mb-2 text-default">> Rp.20,000,000</p>
                                    <p class="text-muted text-small">User/Month</p>
                                </div>
                                <div
                                    class="pl-3 pr-3 pt-3 pb-0 flex-grow-1 d-flex price-feature-list flex-column flex-grow-1">
                                    <ul class="list-unstyled">
                                        <li>
                                            <p class="mb-0 ">
                                                Add Product Up to 200
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                                Advertisement in Home Page
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                                Support delivery services
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                                Additional account security
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                                Forum support
                                            </p>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        {{-- @if ($roles->role == "member")
                                            <form action="" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="roles" value="super member">
                                                <button type="submit" class="btn btn-link btn-empty btn-lg">PURCHASE <i
                                                    class="simple-icon-arrow-right"></i></button>
                                            </form>
                                        @elseif ($roles->role == "super member")
                                            <a href="{{ route('tools.superMember') }}" class="btn btn-primary btn-lg">SUPER MEMBER AREA<i
                                                class="simple-icon-arrow-right"></i></a>
                                        @elseif ($roles->role == "trial")
                                            <form action="">
                                                @csrf
                                                <input type="hidden" name="roles" value="super member">
                                                <button type="submit" class="btn btn-link btn-empty btn-lg">PURCHASE <i
                                                    class="simple-icon-arrow-right"></i></button>
                                            </form>
                                        @endif                 --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection