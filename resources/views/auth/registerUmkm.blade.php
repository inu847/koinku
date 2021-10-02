@extends('layouts.auth')

@section('title')
    Daftar Akun
@endsection

@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">
                        <p class=" text-white h2">When prosperity comes, do not use all of it</p>

                        <p class="white mb-0">
                            Application for selling goods directly or online, in which there are excellent features.
                            <br> such as a guarantor account or a third party
                            <br> that guarantees your transactions.
                        </p>
                    </div>
                    <div class="form-side">
                        <a class="navbar-logo" href="{{ url('/')}} ">
                            <img src="{{asset('img/LOGO 4.png')}}" alt="" style="height: 70px;" class="mb-5">
                        </a>
                        <h6 class="mb-4">Register Umkm</h6>

                        <form method="POST" action="{{ route('registrasiUmkm') }}" enctype="multipart/form-data">
                            @csrf

                            <label class="form-group has-float-label mb-4">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" disabled/>
                                <span>Username</span>
                            </label>
                            <label class="form-group has-float-label mb-4">
                                <input id="nama_toko" type="text" class="form-control" name="nama_toko" value="{{ $user->nama_umkm }}" disabled/>
                                <span>Nama Toko</span>
                            </label>
                            <label class="form-group has-float-label mb-4">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled/>
                                <span>Email</span>
                            </label>
                            <label class="form-group has-float-label mb-3">
                                <input id="phone" type="number" class="form-control" name="phone" value="{{ $user->phone }}" disabled/>
                                <span>Nomor Hp/Wa</span>
                            </label>
                            <i><small class="text-muted">//* berisi data toko yang didaftarkan, seperti:surat izin usaha, foto tempat usaha </small></i>
                            <label class="form-group has-float-label mb-4 mt-1">
                                <input id="file_penunjang" type="file" class="form-control @error('file_penunjang') is-invalid @enderror" name="file_penunjang" value="{{ old('file_penunjang') }}" required autocomplete="file_penunjang" autofocus/>
                                <span>File Penunjang</span>
                                @error('file_penunjang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <label class="form-group has-float-label mb-4">
                                <input id="ktp" type="file" class="form-control @error('ktp') is-invalid @enderror" name="ktp" value="{{ old('ktp') }}" required autocomplete="ktp" autofocus/>
                                <span>Ktp</span>
                                @error('ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <label class="form-group has-float-label mb-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus/>
                                <span>Password</span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="{{ route('home') }}" class="btn btn-danger btn-lg btn-shadow mr-2 white">Home</a>
                                <button class="btn btn-primary btn-lg btn-shadow" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection