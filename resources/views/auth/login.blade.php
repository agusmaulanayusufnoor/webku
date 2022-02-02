@extends('layouts.templatelogin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
               
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="wrapper">
                            <div class="logo"> <img src="{{ url('assets/dist/img/logo-bprku.jpeg') }}" alt="" "> </div>
                            <div class="text-center mt-4 name"> BPRKU E-Box </div>
                            <form class="p-3 mt-3">
                                <div class="form-field d-flex align-items-center">
                                    <span class="far fa-user"></span>
                                    <input type="text" name="username" id="username" placeholder="Username" 
                                    class="@error('username') is-invalid @enderror" value="{{ old('username') }}" 
                                    required autocomplete="username">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                                <div class="form-field d-flex align-items-center">
                                    <span class="fas fa-key"></span>
                                    <input id="password" type="password" name="password" placeholder="Password"
                                     class="@error('password') is-invalid @enderror" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                </div> 
                                <button type="submit" class="btn mt-3"><strong class="bi bi-box-arrow-in-right"> Login</strong></button>
                               
                            </form>
                            <div class="text-center fs-6"> <a href="{{ route('password.request') }}">Forget password?</a> or <a href="{{ route('register') }}">Sign up</a> </div> 
                        </div>

                    </form>
        </div>
    </div>
</div>
@endsection
<script>
https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js
</script>
