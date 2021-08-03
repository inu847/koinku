@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">

                        <p class=" text-white h2">MAGIC IS IN THE DETAILS</p>

                        <p class="white mb-0">
                            Please use your credentials to login.
                            <br>If you are not a member, please
                            <a href="#" class="white">register</a>.
                        </p>
                    </div>
                    <div class="form-side">
                        <a class="navbar-logo" href="{{ url('/')}} ">
                            <img src="{{asset('img/LOGO 4.png')}}" alt="" style="height: 70px;" class="mb-5">
                        </a>
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        <h6 class="mb-4">Login</h6>
                        <form method="POST" action="{{ route('loginBuyer') }}">
                            @csrf

                            <label class="form-group has-float-label mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span>E-mail</span>
                            </label>

                            <label class="form-group has-float-label mb-0">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span>Password</span>
                            </label>
                            {{-- <div class="mb-5">
                                <div class="float-right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">Forget password?</a>
                                    @endif
                                </div> 
                            </div> --}}
                            <label class="custom-control custom-checkbox mb-0">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="custom-control-label"></span>
                                <p class="pt-1">{{ __('Remember Me') }}</p>
                            </label>

                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <a class="btn btn-danger btn-block" href="{{ route('todoRegistrasiBuyer') }}">Register</a>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary btn-block" type="submit">LOGIN</button>
                                </div>
                            </div> 
                            <a href="{{ route('todoLogin') }}" class="btn btn-warning btn-block">Login Seller</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection