@extends('layouts.global')

@section('title')
    Pegadaian
@endsection

@section('content')
    @if(session('status'))
        <div class="alert alert-warning rounded" role="alert">
            {{session('status')}}
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
                                    <h5 class="mb-0 font-weight-semibold color-theme-1 mb-4">Paket 1</h5>
                                    <p class="text-large mb-2 text-default">< Rp.5,000,000</p>
                                    <p class="text-muted text-small">User/Month</p>
                                </div>
                                <div class="pl-3 pr-3 pt-3 pb-0 d-flex price-feature-list flex-column flex-grow-1">
                                    <ul class="list-unstyled">
                                        <li>
                                            <p class="mb-0 ">
                                                Handphone senilai > Rp.1.000.000
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                                Alat Elektronik
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0">
                                                Alat Musik
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                                Perhiasan senilai Rp.5,000,000
                                            </p>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        @if ($gadai)
                                            @if ($gadai->status == "gadai")
                                                <div class="text-center">
                                                    <p class="text-muted">Sedang Dalam Masa Gadai</p>
                                                </div>
                                            @elseif ($gadai->status == "process")
                                                <div class="text-center">
                                                    <p class="text-muted">Sedang Dalam Proses Pengecekan</p>
                                                </div>
                                             @else
                                                <a href="{{ route('gadai.create', 2) }}" class="btn btn-link btn-empty btn-lg">Gadai Sekarang 
                                                <i class="simple-icon-arrow-right"></i></a>
                                            @endif  
                                        @else
                                            <a href="{{ route('gadai.create', 1) }}" class="btn btn-link btn-empty btn-lg">Gadai Sekarang 
                                            <i class="simple-icon-arrow-right"></i></a>
                                        @endif
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
                                    <h5 class="mb-0 font-weight-semibold color-theme-1 mb-4">Paket 2</h5>
                                    <p class="text-large mb-2 text-default">< Rp.10,000,000</p>
                                    <p class="text-muted text-small">User/Month</p>
                                </div>
                                <div class="pl-3 pr-3 pt-3 pb-0 d-flex price-feature-list flex-column flex-grow-1">
                                    <ul class="list-unstyled">
                                        <li>
                                            <p class="mb-0 ">
                                                Kendaraan Roda 2/3
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                                Perhiasan senilai Rp.10,000,000
                                            </p>
                                        </li>
                                    </ul>
                                    @if ($gadai)
                                        
                                        @if ($gadai->status == "gadai")
                                            <div class="text-center">
                                                <p class="text-muted">Sedang Dalam Masa Gadai</p>
                                            </div>
                                        @elseif ($gadai->status == "process")
                                            <div class="text-center">
                                                <p class="text-muted">Sedang Dalam Proses Pengecekan</p>
                                            </div>
                                        @else
                                            <a href="{{ route('gadai.create', 2) }}" class="btn btn-link btn-empty btn-lg">Gadai Sekarang 
                                            <i class="simple-icon-arrow-right"></i></a>
                                        @endif
                                    @else
                                        <a href="{{ route('gadai.create', 2) }}" class="btn btn-link btn-empty btn-lg">Gadai Sekarang 
                                            <i class="simple-icon-arrow-right"></i></a>
                                    @endif    
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
                                    <h5 class="mb-0 font-weight-semibold color-theme-1 mb-4">Paket 3</h5>
                                    <p class="text-large mb-2 text-default">< Rp.50,000,000</p>
                                    <p class="text-muted text-small">User/Month</p>
                                </div>
                                <div
                                    class="pl-3 pr-3 pt-3 pb-0 flex-grow-1 d-flex price-feature-list flex-column flex-grow-1">
                                    <ul class="list-unstyled">
                                        <li>
                                            <p class="mb-0 ">
                                                Kendaraan Roda 4
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                                Rumah
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                                Tanah
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0 ">
                                                Perhiasan senilai > Rp.10,000,000
                                            </p>
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        @if ($gadai)    
                                            @if ($gadai->status == "gadai")
                                                <div class="text-center">
                                                    <p class="text-muted">Sedang Dalam Masa Gadai</p>
                                                </div>
                                            @elseif ($gadai->status == "process")
                                                <div class="text-center">
                                                    <p class="text-muted">Sedang Dalam Proses Pengecekan</p>
                                                </div>
                                            @else
                                                <a href="{{ route('gadai.create', 2) }}" class="btn btn-link btn-empty btn-lg">Gadai Sekarang 
                                                    <i class="simple-icon-arrow-right"></i></a>
                                            @endif
                                        @else
                                            <a href="{{ route('gadai.create', 3) }}" class="btn btn-link btn-empty btn-lg">Gadai Sekarang 
                                                <i class="simple-icon-arrow-right"></i></a>
                                        @endif
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