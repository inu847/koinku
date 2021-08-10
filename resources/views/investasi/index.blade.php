@extends('layouts.global')

@section('title')
    Investasi
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

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
                                    <h1 class="text-white">Rp.{{ $invest->reksa_dana }}</h1>
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
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalContent" data-whatever="@fat" onclick="pembelian(this)" data-id="{{ $products->data[$i]->id }}" data-management="{{ $products->data[$i]->management }}" data-custodian="{{ $products->data[$i]->custodian }}" data-type="{{ $products->data[$i]->type }}">Beli</button>
                    </div>
                </div>
            </div>
        </div>
    @endfor

    {{-- MODALS CREATE INVEST --}}
    <div class="modal fade" id="exampleModalContent" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Investasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="invest">

                </div>
            </div>
        </div>
    </div>
@endsection

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    function pembelian(e){
        let management = e.dataset.management
        let custodian = e.dataset.custodian
        let type = e.dataset.type
        let id = e.dataset.id
        
        let modals = `<form action="{{ url('umkm/investasi/investPerusahaan/`+id+`') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Jumlah Investasi</label>
                                <div>
                                    <small class="text-muted">Masukkan Nominal Minimal Rp.10,000</small>
                                    <input type="number" class="form-control" id="recipient-name" name="invest">
                                </div>
                            </div>
                            <input type="hidden" class="form-control" value="`+management+`" name="management">
                            <input type="hidden" class="form-control" value="`+custodian+`" name="custodian">
                            <input type="hidden" class="form-control" value="`+type+`" name="type">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>`
        $('#invest').html(modals)
    }
</script>