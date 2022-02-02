@extends('layouts.templatelogin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="wrapper">
                            <div class="logo"> <img src="{{ url('assets/img/logobprkuebox.png') }}" alt="" "> </div>
                            <div class="text-center mt-4 name"> BPRKU E-Box </div>
                            <form class="p-3 mt-3">
                                <div class="form-field d-flex align-items-center">
                                    <span class="far fa-user"></span>
                                    <input type="text" name="username" id="password" placeholder="Username">
                                </div>
                                <div class="form-field d-flex align-items-center">
                                    <span class="fas fa-key"></span>
                                    <input type="password" name="password" id="password" placeholder="Password">
                                </div> <button type="submit" class="btn mt-3"><strong class="bi bi-box-arrow-in-right"> Login</strong></button>
                            </form>
                            {{-- <div class="text-center fs-6"> <a href="#">Forget password?</a> or <a href="#">Sign up</a> </div> --}}
                        </div>

                    </form>
        </div>
    </div>
</div>
@endsection
<script>
https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js
</script>
