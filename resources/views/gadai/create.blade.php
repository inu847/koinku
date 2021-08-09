@extends('layouts.global')

@section('title')
    Pegadaian
@endsection

@section('content')

    <div class="mb-3">
        <h1>Form Pegadaian Barang</h1>
        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            <ol class="breadcrumb pt-0">
                <li class="breadcrumb-item">
                    <a href="#">Umkm</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Pegadaian Barang</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Create</a>
                </li>
            </ol>
        </nav>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            {{-- <h5 class="mb-4">Form Pegadaian Barang</h5> --}}
            <form action="{{ route('gadai.storeGadai', $id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Username</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" readonly disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">No. handphone</label>
                        <input type="text" class="form-control" value="{{ $user->phone }}" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">KTP</label>
                        <input type="file" class="form-control" placeholder="KTP" name="ktp">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Jaminan</label>
                        <input type="file" class="form-control" name="jaminan" placeholder="Jaminan">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" class="form-control" cols="30" rows="3" placeholder="Masukkan alasan/keperluan menggadaikan barang"></textarea>
                </div>
                

                <div class="col-2 ml-auto">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" required>
                        <label class="form-check-label" for="inlineCheckbox1">Check me out !</label>
                    </div>
    
                    <button type="submit" class="btn btn-primary d-block mt-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection