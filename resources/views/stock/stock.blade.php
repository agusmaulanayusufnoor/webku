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
  {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
  <!-- JQVMap -->
  {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-ui/jquery-ui.css') }}">
  <!-- summernote -->
  {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />


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

 <!-- datatable  -->
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

              <div class="col-6 col-sm-6">
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
              <div class="col-2 col-sm-2">
              <a href="javascript:void(0)" class="btn btn-primary" id="tombol-tambah">Tambah Stock</a>
              </div>

          </div>


<!--akhir filter tanggal -->

<!-- MULAI TOMBOL TAMBAH -->


                <br>
 <!-- AKHIR TOMBOL -->

<!-- datatable  -->
<div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped table-sm">
                <thead class="text-center">
                  <tr>
                    <th style="width: 8px">No. </th>
                    <th>Jenis</th>
                    <th>Sandi Kantor</th>
                    <th>Tanggal</th>
                    <th>Jumlah Stok Awak</th>
                    <th>Tambahan Stock</th>
                    <th>Jumlah Digunakan</th>
                    <th>Jumlah Rusak</th>
                    <th>Jumlah Hilang</th>
                    <th>Jumlah Stok Akhir</th>
                    <th>Edit/Del</th>
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
  <!-- akhir container -->
<!-- MULAI MODAL FORM TAMBAH/EDIT-->
<div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-judul"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                        <div class="row">
                            <div class="col-sm-12">

                                <input type="hidden" name="id" id="id">

                                <div class="form-group">
                                    <!-- <label for="name" class="col-sm-12 control-label">Jenis Stock</label> -->
                                    <div class="col-sm-12">
                                        <select name="jenis" id="jenis" class="form-control required">
                                            <option value="">- Pilih Jenis Stock -</option>
                                            <option value="1">Tabungan</option>
                                            <option value="2">Deposito</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- <label for="name" class="col-sm-12 control-label">Kantor Cabang</label> -->
                                    <div class="col-sm-12">
                                        <select name="sandi_kantor" id="sandi_kantor" class="form-control required">
                                            <option value="">- Pilih Kantor -</option>
                                            <option value="3">001 - Cab. KPO</option>
                                            <option value="2">002 - Cab. Cisalak</option>
                                            <option value="4">003 - Cab. Subang</option>
                                            <option value="5">004 - Cab. Purwadadi</option>
                                            <option value="6">005 - Cab. Pamanukan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-sm-12">
                                    <input name="tanggal" id="tanggal" value=""
                                    class="form-control datepicker" placeholder="Tanggal" type="text" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="jml_stok_awal" name="jml_stok_awal"
                                        placeholder="Jumlah Stok Awal" value="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="tambahan_stok" name="tambahan_stok"
                                        placeholder="Tambahan Stok" value="" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="jml_digunakan" name="jml_digunakan"
                                        placeholder="Jumlah Digunakan" value="" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="jml_rusak" name="jml_rusak"
                                        placeholder="Jumlah Rusak" value="" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="jml_hilang" name="jml_hilang"
                                        placeholder="Jumlah Hilang" value="" required>
                                    </div>
                                </div>
                                <!-- jumlah stok akhir dihidden dan dijumlahkan -->
                                      <input type="hidden" name="jml_stok_akhir" id="jml_stok_akhir" value="">
                            </div>

                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                                    value="create">Simpan
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR MODAL -->
     <!-- MULAI MODAL KONFIRMASI DELETE-->

     <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PERHATIAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Jika menghapus ini maka</b></p>
                    <p>data stock tersebut hilang selamanya, mau dihapus?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus
                        Data</button>
                </div>
            </div>
        </div>
    </div>

    <!-- AKHIR MODAL -->
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
<!-- <script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script> -->
<!-- JQVMap -->
{{-- <script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
<!-- jQuery Knob Chart -->
{{-- <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script> --}}
<!-- daterangepicker -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<!-- <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/air-datepicker/air-datepicker.js') }}"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
{{-- <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}
<!-- Summernote -->
{{-- <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script> --}}
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
<script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <!-- <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script> --> --}}
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
            $('.inputTgl').datepicker({
                todayBtn: 'linked',
                dateFormat: 'yy-mm-dd',
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
        "fnCreatedRow": function (row, data, index) {
                    $('td', row).eq(0).html(index + 1);
                    },
        "responsive": true, "lengthChange": true, "autoWidth": true,
        "processing": true,"serverSide": true, "deferRender": true,//aktifkan server-side
        ajax: {
                    url: "{{ route('stock.index') }}",
                    data:{from_date:from_date, to_date:to_date}, //jangan lupa kirim parameter tanggal
                    type: "GET",
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'kode_kantor',
                        name: 'kode_kantor'
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
                    {
                        data: 'action',
                        name: 'action'
                    },

                ],
                order: [
                    [0, 'desc']
                ],

        "lengthMenu": [
        [14, 28, -1],
        [14, 28, "All"]
        ],
        "dom": 'Bfrtip',

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
                        columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                        }
                    },
                    {
                        extend:"print",
                        title :"Laporan Stok Buku Tabungan dan Bilyet Deposito",
                        exportOptions: {
                        columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                        }
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

//TOMBOL TAMBAH DATA
        //jika tombol-tambah diklik maka
        $('#tombol-tambah').click(function () {
            $('#button-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Stock Tabungan dan Deposito"); //valuenya tambah stock baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });
        $("#jml_stok_awal, #tambahan_stok,#jml_digunakan,#jml_rusak,#jml_hilang").keyup(function() {
                            var jml_stok_awal = $("#jml_stok_awal").val();
                            var tambahan_stok = $("#tambahan_stok").val();
                            var jml_digunakan = $("#jml_digunakan").val();
                            var jml_rusak     = $("#jml_rusak").val();
                            var jml_hilang     = $("#jml_hilang").val();

                            var jml_stok_akhir = parseInt(jml_stok_awal) + parseInt(tambahan_stok) - parseInt(jml_digunakan) - parseInt(jml_rusak) - parseInt(jml_hilang);
                            $("#jml_stok_akhir").val(jml_stok_akhir);


                        });

        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({


                submitHandler: function (form) {

                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');

                    $.ajax({
                        data: $('#form-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('stock.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil
                         // alert(data);
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#example1').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('
                                success ')}}',
                                position: 'topRight'
                            });
                          
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }

        //TOMBOL EDIT DATA PER STOCK DAN TAMPIKAN DATA BERDASARKAN ID STOCK KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit-post', function () {
            var data_id = $(this).data('id');
            $.get('stock/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit Post");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');

                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas
                 $('#id').val(data.id);
                 $('#jenis').val(data.jenis);
                 $('#sandi_kantor').val(data.sandi_kantor);
                 $('#tanggal').val(data.tanggal);
                 $('#jml_stok_awal').val(data.jml_stok_awal);
                $('#tambahan_stok').val(data.tambahan_stok);
                $('#jml_digunakan').val(data.jml_digunakan);
                $('#jml_rusak').val(data.jml_rusak);
                $('#jml_hilang').val(data.jml_hilang);
                $('#jml_stock_akhir').val(data.jml_stock_akhir);
            })
        });

        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });

        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function () {
            $.ajax({

                url: "stock/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#example1').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                    iziToast.warning({ //tampilkan izitoast warning
                        title: 'Data Berhasil Dihapus',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'topRight'
                    });
                }
            })
        });
</script>

@endpush
