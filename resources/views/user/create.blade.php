@extends('layouts.master')
@section('title','Dashboard')
@push('custom-css')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
@endpush
@section('content')




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             {{-- <h1 class="m-0">TAMBAH USER</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                 <a class="btn btn-outline-danger" href="{{ url('user') }}" role="button">
                 <i class="far fa-window-close nav-icon"></i>
                Batal
                 </a>
              </li>
              <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <!-- form tambah -->
  <div class="card card-primary">
    <div class="card-header mx-auto"  style="width: 360px; margin-top:30px">
    <h3 class="text-center">Tambah User</h3>
    </div>
    <article class="card-body mx-auto" style="min-width: 400px;">

<form action="{{ url('user') }}" method="post">
  @csrf
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="username" value="{{  old('username')  }}" class="form-control @error('username') is-invalid @enderror" placeholder="Username" type="text" autofocus>
        @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div> <!-- form-group// -->

    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" value="{{  old('name')  }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" type="text">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div> <!-- form-group// -->


    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-briefcase"></i> </span>
		</div>
		<select name="level_id" class="form-control @error('level_id') is-invalid @enderror">
			<option value=""> pilih divisi</option>
          @foreach ($levels as $items)

          <option value="{{ $items->id }}" {{ old('level_id') == $items->id ? 'selected' : '' }}>{{ $items->level_divisi }}</option>
          @endforeach
		</select>
        @error('level_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
	</div> <!-- form-group end.// -->
  <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		<select name="kantor_id" class="form-control @error('kantor_id') is-invalid @enderror">
			<option value=""> pilih kantor</option>
		@foreach ($kantors as $kode)
          <option value="{{ $kode->id }}" {{ old('kantor_id') == $kode->id ? 'selected' : '' }}>{{ $kode->nama_kantor }}</option>
          @endforeach
		</select>
        @error('kantor_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
	</div> <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Buat Password" type="password">
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div> <!-- form-group// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password_confirmation" class=form-control @error('password_confirmation') is-invalid @enderror" placeholder="Ulangi Password" type="password">
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div> <!-- form-group// -->

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Simpan  </button>
    </div> <!-- form-group// -->
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
</form>
</article>
</div> <!-- card.// -->

</div>
<!--container end.//-->

@endsection
@push('custom-js')

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
@endpush
