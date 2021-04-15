@extends('dashboard.master.master')

@section('title')
History Barang Masuk
@endsection
    
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('css/Template/table/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/Template/table/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/Template/table/buttons.bootstrap4.min.css') }}">
@endsection

@section('js_atas')

@endsection

{{-- manajemen menu aktif --}}
@section('history_open')
menu-open
@endsection

@section('bm_aktif')
active
@endsection
{{-- end manajemen --}}

@section('page_aktif')
<li class="breadcrumb-item active">Barang Masuk</li>
<li class="breadcrumb-item active">History</li>
@endsection

@section('isi')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div> --}}
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                  <th>Pegawai</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>BB01</td>
                  <td>Singkong</td>
                  <td>20</td>
                  <td>02/27/2021</td>
                  <td>-</td>
                  <td>Fikri Halim Ch</td>
                </tr>
                <tr>
                  <td>BB02</td>
                  <td>Singkong</td>
                  <td>10</td>
                  <td>10/27/2021</td>
                  <td>-</td>
                  <td>Fikri Halim Ch</td>
                </tr>
                <tr>
                  <td>PS01</td>
                  <td>Biji Plastik</td>
                  <td>10</td>
                  <td>01/27/2021</td>
                  <td>-</td>
                  <td>Fikri Halim Ch</td>
                </tr>
                <tr>
                  <td>PS02</td>
                  <td>Biji Plastik</td>
                  <td>30</td>
                  <td>09/27/2021</td>
                  <td>kondisi baik</td>
                  <td>Fikri Halim Ch</td>
                </tr>
                <tr>
                  <td>BJ01</td>
                  <td>Keripik Sanjai</td>
                  <td>30</td>
                  <td>04/27/2021</td>
                  <td>kondisi baik</td>
                  <td>Fikri Halim Ch</td>
                </tr>
                <tr>
                  <td>BJ02</td>
                  <td>Keripik Sanjai</td>
                  <td>50</td>
                  <td>12/27/2021</td>
                  <td>kondisi baik</td>
                  <td>Fikri Halim Ch</td>
                </tr>
                </tbody>
                <tfoot>
                <!-- <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr> -->
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection

@section('js_bawah')
<!-- DataTables  & Plugins -->
<script src="{{ asset('js/Template/table/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/Template/table/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/Template/table/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/Template/table/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/Template/table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/Template/table/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/Template/table/jszip.min.js') }}"></script>
<script src="{{ asset('js/Template/table/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/Template/table/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/Template/table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/Template/table/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/Template/table/buttons.colVis.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection