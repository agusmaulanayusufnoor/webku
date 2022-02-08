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
  {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> --}}
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

  <!-- Datatable -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">DATA USER</h1> -->

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
             <a class="btn btn-primary" href="{{ url('kredit/uploadkre') }}" role="button">
                 <i class="far fa-plus-square nav-icon"></i>
                 Upload File
                 </a>
              </li>
              <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- table -->


      <div class="container-fluid">

        <div class="row justify-content-md-center">
          <div class="col-md-12">
          @if (session()->exists('message'))
            <div class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
            </div>
          @endif
          @if (session()->exists('hapus'))
            <div class="alert alert-danger" role="alert">
            <strong>{{ session('hapus') }}</strong>
            </div>
          @endif
<!-- tabel yg dipakai -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Downlod File Map Kredit</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-flex justify-content-center">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <tfoot style="display:table-header-group;">
                  <tr>
                      <th></th>
                      <th>Kantor</th>
                      {{-- <th>Tanggal Upload</th> --}}
                      <th>No Rekening</th>
                      {{-- <th>Kode Obox</th> --}}
                      <th>Tanggal Realisasi</th>
                      <th>Nama File</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <thead class="text-center">
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Kantor</th>
                      {{-- <th>Tanggal Upload</th> --}}
                      <th>No Rekening</th>
                      {{-- <th>Kode Obox</th> --}}
                      <th>Tanggal Realisasi</th>
                      <th>Nama File</th>
                      <th>Download</th>
                      <th>Hapus</th>
                    </tr>
                  </thead>

                  <tbody>
                  @foreach($datakre as $key=>$value)
                  <tr>
                      <td style="width: 10px">
                            {{  $loop -> iteration }}
                      </td>
                      <td>
                          {{  $value -> kantor->nama_kantor }}
                      </td>
                      {{-- <td class="text-center">
                        {{  $value -> created_at->format('d/m/Y')}}
                      </td> --}}
                      <td>
                          {{  $value -> no_rekening }}
                     </td>
                     {{-- <td>
                          {{  $value -> kode_obox }}
                     </td> --}}
                     <td>
                          {{  $value -> periode }}
                     </td>
                      <td>
                          {{  $value -> namafile }}
                     </td>
                      <td>
                        <div class="row justify-content-md-center">
                            <a href="{{ asset('filekre/'.$value -> file) }}">
                                <button class="btn btn-outline-info btn-xs" type="button">
                                    <i class="fa fa-download nav-icon" alt="hapus"></i>
                                </button>
                            </a>
                        </div>
                      </td>
                      <td>
                      <div class="row justify-content-md-center">
                      <form method="post" action="{{ url('kredit/download/'.$value->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-xs" type="submit">
                                <i class="fa fa-minus-circle nav-icon" alt="hapus"></i>
                            </button>
                        </form>
                    </div>

                      </td>
                    </tr>

                  @endforeach
                  </tbody>
                </div>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
     <!-- end tabel yg dipakai        -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
</div>
    <!-- end tabel -->


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
<!-- Sparkline -->
{{-- <!-- <script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script> --> --}}
<!-- JQVMap -->
{{-- <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
<!-- jQuery Knob Chart -->
{{-- <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script> --}}
<!-- daterangepicker -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
{{-- <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}

<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- datatable -->
<script src="{{ asset('assets/plugins/datatables/dt/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.dateTime.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

<script>
//   $(function () {
//     $("#example1").DataTable({
//       "responsive": true, "lengthChange": false, "autoWidth": true,
//       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
//     $('#example2').DataTable({
//       "paging": true,
//       "lengthChange": false,
//       "searching": false,
//       "ordering": true,
//       "info": true,
//       "autoWidth": false,
//       "responsive": true,
//     });
//   });
  $(document).ready(function() {
    $('#example1').DataTable( {

        "responsive": true,
        initComplete: function () {
            this.api().columns([1,2,3,4]).every( function () {

                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option>'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>
@endpush
