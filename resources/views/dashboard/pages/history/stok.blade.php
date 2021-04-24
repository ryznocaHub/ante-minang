@extends('dashboard.master.master')

@section('title')
History {{ $jenis == '1' ? "Bahan baku" : "produk"}} {{$kategori == '1' ? "Masuk" : "Keluar"}}
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
@if ($jenis == '1')
@section('bahanbaku_open')
menu-open
@endsection
@if ($kategori == '1')
@section('bbm_aktif')
active
@endsection
@else
@section('bbk_aktif')
active
@endsection
@endif
@else
@section('produk_open')
menu-open
@endsection
@if ($kategori == '1')
@section('pm_aktif')
active
@endsection
@else
@section('pk_aktif')
active
@endsection
@endif
@endif
{{-- end manajemen --}}

@section('page_aktif')
<li class="breadcrumb-item active">{{$kategori == '1' ? "Masuk" : "Keluar"}}</li>
<li class="breadcrumb-item active">{{ $jenis == '1' ? "Bahan baku" : "produk"}}</li>
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
                  {{-- kode barang BB->bahan baku , BJ->Produk --}}
                  <th>ID</th>
                  {{-- nama barang --}}
                  <th>Nama</th>
                  {{-- jumlah barang --}}
                  <th>Jumlah</th>
                  {{-- tanggal masuk/keluar --}}
                  <th>Waktu</th>

                  <th>Keterangan</th>
                  <th>Pegawai</th>
                </tr>
              </thead>
              <tbody>
                @foreach($histories as $history)
                <tr>
                  <td>{{$history->kode}}</td>
                  <td>{{$history->nama}}</td>
                  <td>{{$history->jumlah}} <small>{{$history->satuan}}</small></td>
                  <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $history->tanggal)->format('d - m - Y || H:i:s') }}</td>
                  <td>{{$history->keterangan}}</td>
                  <td>{{$history->user->name}}</td>
                </tr>
                @endforeach
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
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
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