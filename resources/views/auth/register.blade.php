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
                            <br>  that guarantees your transactions.
                        </p>
                    </div>
                    <div class="form-side">
                        <a class="navbar-logo" href="{{ url('/')}} ">
                            <img src="{{asset('img/LOGO 4.png')}}" alt="" style="height: 70px;" class="mb-5">
                        </a>
                        <h6 class="mb-4">Register</h6>

                        <form method="POST" action="{{ route('registrasi') }}" enctype="multipart/form-data">
                            @csrf

                            <label class="form-group has-float-label mb-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                <span>Username</span>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <label class="form-group has-float-label mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                <span>Email</span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <label class="form-group has-float-label mb-3">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus/>
                                <span>Nomor Hp/Wa</span>
                                @error('phone')
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
                            <label class="form-group has-float-label mb-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"/>
                                <span>Konfirmasi Password</span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="{{ route('login') }}" class="btn btn-danger btn-lg btn-shadow mr-2 white">Login</a>
                                <button class="btn btn-primary btn-lg btn-shadow" type="submit">REGISTER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection