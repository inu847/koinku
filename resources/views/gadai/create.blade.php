@extends('layouts.global')

@section('titile')
    Pegadaian
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h1>Gadai</h1>
            </div>
            <div id="accordion" class="form-group">
                <div class="border">
                    <button type="button" id="alamat" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="false" aria-controls="collapseOne">
                        -> Alamat Utama
                    </button>

                    <div id="collapseOne" class="collapse " data-parent="#accordion">
                        <div class="p-4">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Nama_toko</label>
                                    <input name="nama_umkm" id="province" class="form-control" value="{{ $user->nama_umkm }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input name="email" id="province" class="form-control" value="{{ $user->email }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">No Handphone</label>
                                    <input name="phone" id="province" class="form-control" value="{{ $user->phone }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Provinsi</label>
                                    <input name="provinsi" id="province" class="form-control" value="{{ province($user->alamat->provinsi) }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Kabupaten/Kota</label>
                                    <input name="kabupaten" id="kota" class="form-control" value="{{ kota($user->alamat->kabupaten) }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Kelurahan</label>
                                    <input name="kecamatan" id="kelurahan" class="form-control" value="{{ kelurahan($user->alamat->kecamatan) }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Desa</label>
                                    <input name="desa" id="desa" class="form-control" value="{{ desa($user->alamat->desa) }}" disabled>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Jalan dan lain-lain</label>
                                    <input type="text" class="form-control" name="lain" placeholder="Jalan, RT/RW" value="{{ $user->alamat->lain }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('gadai.storeGadai', [$id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">KTP</label>
                    <input type="file" name="ktp" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Jaminan</label>
                    <input type="file" name="jaminan" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Nominal</label>
                    <div class="font-italic">
                        @if ($id == 1)
                            <small>*nominal maksimal senilai 5.000.000</small>
                        @elseif ($id == 2)
                            <small>*nominal maksimal senilai 10.000.000</small>
                        @elseif ($id == 3)
                            <small>*nominal maksimal senilai 50.000.000</small>
                        @endif
                    </div>
                    <input type="number" name="nominal" class="form-control" placeholder="Masukkan Nominal">
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" id="" class="form-control" cols="50" rows="5"></textarea>
                </div>

                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('gadai.index') }}" class="btn btn-info mr-2">Back</a>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection