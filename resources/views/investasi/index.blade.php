@extends('layouts.global')

@section('title')
    Investasi
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card mb-4 progress-banner">
                            <div class="card-body justify-content-between d-flex flex-row align-items-center">
                                <div>
                                    <p class="lead text-white">Reksa Dana</p>
                                    <i class="iconsminds-billing text-white align-text-bottom d-inline-block"></i>
                                </div>
                                <div>
                                    <h1 class="text-white">Rp.60,000</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="card mb-4 progress-banner">
                            <div class="card-body justify-content-between d-flex flex-row align-items-center">
                                <div>
                                    <p class="lead text-white">Total Keuntungan</p>
                                    <i class="iconsminds-coins text-white align-text-bottom d-inline-block"></i>
                                </div>
                                <div>
                                    <h1 class="text-white">Rp.10,000</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="card mb-4 progress-banner">
                            <div class="card-body justify-content-between d-flex flex-row align-items-center">
                                <div>
                                    <p class="lead text-white">Imbal Hasil</p>
                                    <i class="iconsminds-coins text-white align-text-bottom d-inline-block"></i>
                                </div>
                                <div>
                                    <h1 class="text-white">+0.13%</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="text-center">
                <button class="btn btn-info btn-lg mr-3">Jual</button>
                <button class="btn btn-primary btn-lg">Beli</button>
            </div>
        </div>
    </div>
    <hr class="m-4">
    @for ($i = 0; $i < count($products->data); $i++)
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-11">
                        <h3><strong>{{ $products->data[$i]->name }}</strong></h3>
                        <p>{{ $products->data[$i]->management }}</p>
                        <p>{{ $products->data[$i]->custodian }}</p>
                        <p>{{ $products->data[$i]->type }}</p>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-secondary">Beli</button>
                    </div>
                </div>
            </div>
        </div>
    @endfor
@endsection