@extends('layouts.master')
@section('title','Dashboard')
@push('custom-css')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
 <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}"> --}}
@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="m-0">UPLOAD FILE DEPOSITO</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                 <a class="btn btn-outline-secondary" href="{{ url('pelayanan/downloaddep') }}" role="button">
                 <i class="far fa-window-close nav-icon"></i>
                Download
                 </a>
              </li>
              <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content header -->

    <!-- form tambah -->
    <div class="row">
  <div class="col-sm-6">
  <div class="card card-secondary">

    <div class="card-header mx-auto"  style="width: 55%; margin-top:20px">
    <h4 class="text-center">UPLOAD</h4>
    </div>
    <div class="card-body mx-auto" style="width: 60%;">

      @if (session()->exists('message'))
            <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
            </div>
      @endif
      @if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif
      <form action="{{ url('/pelayanan/simpandep-file') }}" method="post" enctype="multipart/form-data">
          @csrf

          <input type="hidden" name="kantor_id" value={{auth()->user()->kantor_id}}></input>

          <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-file-invoice-dollar"></i> </span>
            </div>
                <input name="no_rekening" value="{{  old('no_rekening')  }}" class="form-control @error('no_rekening') is-invalid @enderror" placeholder="Norekening tanpa titik"
                type="text" onkeypress="return /['0-9','D']/i.test(event.key)" maxlength="12" oninput="this.value = this.value.toUpperCase()">
                @error('no_rekening')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> <!-- form-group// -->

            <!-- form-group// -->
          {{-- <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
            </div>
                <input id="reservation" name="periode" value="{{  old('periode')  }}" class="form-control @error('periode') is-invalid @enderror" placeholder="Periode Laporan Obox" type="text">
                @error('periode')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> <!-- form-group// --> --}}
            <div class="form-group input-group">

                <div class="input-group date" id="reservationdate" data-target-input="nearest">
            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
            </div>
                <input type="text" id="reservationdate" data-target="#reservationdate"
                data-toggle="datetimepicker" name="periode" value=""
                class="form-control datetimepicker-input @error('periode') is-invalid @enderror"
                placeholder="Tanggal Realisasi">
                @error('periode')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
            </div> <!-- form-group// -->
            <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-archive"></i> </span>
            </div>
                <input name="namafile" value="{{  old('namafile')  }}" class="form-control @error('namafile') is-invalid @enderror"
                placeholder="Nama File : 'nama_nasabah'" type="text" oninput="this.value = this.value.toUpperCase()">
                @error('namafile')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> <!-- form-group// -->


            <div class="form-group input-group">
            <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-archive"></i> </span>
            </div>
            <div class="custom-file">

                <input name="file" id="exampleInputFile" class="custom-file-input" placeholder="" type="file">
                <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
            </div>

                @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> <!-- form-group// -->


            <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-secondary"><i class="fa fa-share-square"></i> Simpan  </button>
                @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">

            <strong>{{ $message }}</strong>
            </div>
            @endif
            </div> <!-- form-group// -->

      </form>

    </div><!-- card body// -->

  </div> <!-- card.// -->
  </div> <!--tutup col -->
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <label>Keterangan :</label>
      <p class="text-left">1. File yang di upload harus format file .zip (bukan .rar)</p>
      {{-- <p class="text-left">2. Didalam .zip harus ada satu file PDF yang sudah digabung</p> --}}
      {{-- <p class="text-left">3. File PDF bisa digabung <a href="https://www.ilovepdf.com/merge_pdf" target="blank">disini</a></p> --}}
      <p class="text-left">2. Format nama file : nama_nasabah.zip contoh: 'UDIN.zip'</p>
      {{-- <p class="text-left">5. kode obox : <br>
                                        - CR006 = File debitur baru dengan plafon terbesar. <br>
                                        - CR008 = File debitur penurunan baki debet terbesar. <br>
                                        - CR009 = File debitur perubahan kolektibilitas berdasarkan baki debet terbesar.
      </p> --}}


      </div>
    </div>
</div><!--tutup col -->
</div> <!--tutup row -->

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
{{-- <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script> --}}

<!-- JQVMap -->
{{-- <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
{{-- <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script> --}}
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <!-- <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script> --> --}}

<script>
 $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$('#reservationdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });
 //Date range picker

 $('#reservation').daterangepicker({
  autoUpdateInput: false,
      locale: {
        format: 'DD/MM/YYYY',
        cancelLabel: 'Clear'
      }
    })
 $('#reservation').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
});
</script>

@endpush
