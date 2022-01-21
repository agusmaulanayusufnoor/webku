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
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.dateTime.min.css') }}">


  @endpush
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">PT BPR KARYA UTAMA JABAR</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

{{-- datatable --}}
<div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Stock Buku Tabungan dan Bilyet Deposito</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          {{-- form filter tanggal --}}

          <form action="{{ route('search') }}" method="get">
            <div class="d-flex justify-content-center">
            @csrf
            <div class="col-8 col-sm-">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text label label-default">Mulai Tanggal</span>
                  </div>
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
              </div>
                  <input name="from" id="min" onfocus="(this.type='date')"
                  class="form-control placeholder="Dari Tanggal" type="text">

                <div class="input-group-prepend">
                    <span class="input-group-text label label-default">Sampai Tanggal</span>
                  </div>
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
              </div>
                  <input name="to" id="max" onfocus="(this.type='date')" class="form-control placeholder="Sampai Tanggal" type="text">

                  <button type="submit" class="btn btn-primary " name="search"> Filter </button>
              </div> <!-- form-group// -->
        </div><!-- col7 -->
    </div>
          </form>

{{-- filter tanggal --}}


{{-- datatable --}}
<div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped table-sm">
                <thead class="text-center">
                  <tr>
                    <th style="width: 5px">No</th>
                    <th>Jenis</th>
                    <th>Sandi Kantor</th>
                    <th>Tanggal</th>
                    <th>Jumlah Stok Awak</th>
                    <th>Tambahan Stock</th>
                    <th>Jumlah Digunakan</th>
                    <th>Jumlah Rusak</th>
                    <th>Jumlah Hilang</th>
                    <th>Jumlah Stok Akhir</th>
                    <th>Del</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($stockdata as $key=>$value)
                  <tr style="tr { height: 50px; }">
                    <td>
                          {{  $loop -> iteration }}
                    </td>
                    <td>
                       {{  $value -> jenisstok->jenis }}
                    </td>
                    <td>
                        {{  $value -> kantor->nama_kantor }}
                   </td>
                    <td>
                      {{  date('d/m/Y',strtotime($value -> tanggal)) }}
                    </td>
                    <td class="text-center">
                      {{  $value -> jml_stok_awal }}
                    </td>
                    <td class="text-center">
                        {{  $value -> tambahan_stok }}
                    </td>
                    <td class="text-center">
                        {{  $value -> jml_digunakan }}
                    </td>
                    <td class="text-center">
                        {{  $value -> jml_rusak }}
                    </td>
                    <td class="text-center">
                        {{  $value -> jml_hilang }}
                    </td>
                    <td class="text-center">
                        {{  $value -> jml_stok_akhir }}
                    </td>
                    <td>
                    <div class="row justify-content-md-center">
                      <form method="post" action="{{ url('stock/'.$value->id) }}">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE">
                          <button class="btn btn-danger btn-sm" type="submit">
                              <small>
                              <i class="fa fa-minus-circle nav-icon" alt="hapus"></i>
                              </small>
                            </button>
                      </form>
                  </div>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
</div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>

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
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.dateTime.min.js') }}"></script>



<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
{{-- menu export --}}
<script>


    $(document).ready(function () {

      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        "buttons": [
                    {
                        extend:"copy",
                        exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                        }
                    },
                    {
                        extend:"csv",
                        exportOptions: {
                        columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                        }
                    },
                    {
                        extend:"excel",
                        title : "",
                        exportOptions: {
                        columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                        }
                    },
                    {
                        extend:"pdf",
                        title :"Laporan Stok Buku Tabungan dan Bilyet Deposito",
                        exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                        }
                    },
                    {
                        extend:"print",
                        title :"Laporan Stok Buku Tabungan dan Bilyet Deposito",
                        exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                        }
                    },
                    {
                        extend:"colvis"}
                ]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

      $('#example2').DataTable({

        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });


    });

// Custom filtering function which will search data in column four between two values
</script>
@endpush
