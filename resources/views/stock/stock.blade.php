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
  <!-- <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-ui/jquery-ui.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.dateTime.min.css') }}"> -->


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
          
            <div class="d-flex justify-content-center">
                  
              <div class="col-3 col-sm-3">
              <div class="input-group date">
                  <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
                  </div>
                      <input name="from_date" id="from_date" 
                      class="form-control datepicker" placeholder="Dari Tanggal" type="text">
                  <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
                  </div>
                      <input name="to_date" id="to_date" 
                      class="form-control datepicker" placeholder="Sampai Tanggal" type="text">

                      <button type="submit" class="btn btn-primary btn-sm" name="filter" id="filter"> Filter </button>
                      <button type="button" name="refresh" id="refresh" class="btn btn-outline-secondary btn-sm">Refresh</button>
                  </div> <!-- form-group// -->
              </div><!-- col3 -->
         
          </div>
      

{{-- filter tanggal --}}


{{-- datatable --}}
<div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped table-sm">
                <thead class="text-center">
                  <tr>
                    <!-- <th style="width: 5px">No</th> -->
                    <th>Jenis</th>
                    <th>Sandi Kantor</th>
                    <th>Tanggal</th>
                    <th>Jumlah Stok Awak</th>
                    <th>Tambahan Stock</th>
                    <th>Jumlah Digunakan</th>
                    <th>Jumlah Rusak</th>
                    <th>Jumlah Hilang</th>
                    <th>Jumlah Stok Akhir</th>
                    <!-- <th>Del</th> -->
                  </tr>
                </thead>
             
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
<!-- <script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script> -->
<!-- JQVMap -->
<script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<!-- <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/air-datepicker/air-datepicker.js') }}"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/dt/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- <script src="{{ asset('assets/plugins/datatables-bs4/js/moment.min.js') }}"></script> -->
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
<!-- <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script> -->
{{-- menu export --}}
<script>


    $(document).ready(function () {
      $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

          //jalankan function load_data diawal agar data ter-load
          load_data();
            //Iniliasi datepicker pada class input
            $('.datepicker').datepicker({
                todayBtn: 'linked',
                dateFormat: 'dd/mm/yy',
              autoclose: true, 
              todayHighlight: true,
            });

            $('#filter').click(function () {
                 var from_date = $('#from_date').val(); 
                 var to_date = $('#to_date').val(); 
                //alert(from_date)
                if (from_date != '' && to_date != '') {
                    $('#example1').DataTable().destroy();
                    load_data(from_date, to_date);
                    //alert(from_date)
                } else {
                    alert('kedua tanggal harus diisi');
                }
            });

            $('#refresh').click(function () {
                $('#from_date').val('');
                $('#to_date').val('');
                $('#example1').DataTable().destroy();
                load_data();
            });
   function load_data(from_date = '', to_date = '') {
    //alert(from_date)
      $("#example1").DataTable({
        
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "processing": true,"serverSide": true, //aktifkan server-side
        ajax: {
                    url: "{{ route('stock.index') }}",
                    data:{from_date:from_date, to_date:to_date}, //jangan lupa kirim parameter tanggal 
                    type: "GET",
                },
             
                columns: [{
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'sandi_kantor',
                        name: 'sandi_kantor'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'jml_stok_awal',
                        name: 'jml_stok_awal'
                    },
                    {
                        data: 'tambahan_stok',
                        name: 'tambahan_stok'
                    },
                    {
                        data: 'jml_digunakan',
                        name: 'jml_digunakan'
                    },
                    {
                        data: 'jml_rusak',
                        name: 'jml_rusak'
                    },
                    {
                        data: 'jml_hilang',
                        name: 'jml_hilang'
                    },
                    {
                        data: 'jml_stok_akhir',
                        name: 'jml_stok_akhir'
                    },
                   

                ],
                order: [
                    [0, 'desc']
                ],
       
       
        "lengthMenu": [
        [10, 14, 28, -1],
        [10, 14, 28, "All"]
        ],
        "dom": 'Bfrtip',
      
        "buttons": [
                    {
                        extend:"copy",
                        // exportOptions: {
                        // columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                        // }
                    },
                    {
                        extend:"csv",
                        // exportOptions: {
                        // columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                        // }
                    },
                    {
                        extend:"excel",
                        title : "",
                        // exportOptions: {
                        // columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                        // }
                    },
                    {
                        extend:"pdf",
                        title :"Laporan Stok Buku Tabungan dan Bilyet Deposito",
                        // exportOptions: {
                        // columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                        // }
                    },
                    {
                        extend:"print",
                        title :"Laporan Stok Buku Tabungan dan Bilyet Deposito",
                        // exportOptions: {
                        // columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                        // }
                    },
                        {
                          extend:"pageLength"
                        },
                    {
                        extend:"colvis"}
                ]
      });

      $('#example2').DataTable({

        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
    }//endfunctionloaddata
    });
 
// Custom filtering function which will search data in column four between two values
</script>

@endpush
