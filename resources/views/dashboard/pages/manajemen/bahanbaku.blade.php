@extends('dashboard.master.master')

@section('title')
Manajemen Bahan Baku
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('css/Template/table/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/Template/table/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/Template/table/buttons.bootstrap4.min.css') }}">
@endsection

{{-- manajemen menu aktif --}}
@section('mb_open')
menu-open
@endsection

@section('mb_bb_aktif')
active
@endsection
{{-- end manajemen --}}

@section('page_aktif')
<li class="breadcrumb-item active">@yield('title')</li>
<li class="breadcrumb-item active">Manajemen Barang</li>
@endsection

@section('isi')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-8">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <th>ID</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Manajemen Stok</th>
              </thead>
              <tbody>
                @foreach($bahanbakus as $bahanbaku)
                <tr>
                  <td>{{$bahanbaku->kode}}</td>
                  <td>{{$bahanbaku->nama}}</td>
                  <td>{{$bahanbaku->jumlah}} <small>{{$bahanbaku->satuan}}</small> </td>
                  <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tambah{{$bahanbaku->id}}"><i class="fas fa-plus"></i></button>

                    <div class="modal fade" id="tambah{{$bahanbaku->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-info">
                            <h4 class="modal-title">Tambah Stok {{$bahanbaku->nama}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="{{ route('bahanbaku.update', $bahanbaku->id) }}">
                              <!-- text input -->
                              @csrf
                              @method('PUT')
                              <input type="hidden" name="id" value="{{$bahanbaku->id}}">
                              <input type="hidden" name="satuan" value="{{$bahanbaku->satuan}}">
                              <div class="card bg-info text-center ">
                                <h1 class="card-title mt-2" style="font-size: 1rem;">Stok {{$bahanbaku->nama}} saat ini</h1>
                                <h1 class="card-title mt-3" style="font-size: 3rem;">{{$bahanbaku->jumlah}} <small class="ml-2">{{$bahanbaku->satuan}}</small></h1>
                                <i class="fas fa-cubes fa-3x my-3"></i>
                              </div>
                              <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" min="1" value="0" name="jumlah" class="form-control" placeholder="Enter ...">
                              </div>
                              <div class="form-group mt-4">
                                <label>Keterangan</label>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio1" name="radioKeterangan" value="select" checked>
                                  <label for="customRadio1" class="custom-control-label col-6">
                                    <select name="keteranganSelect" class="form-control select2" style="width: 100%;">
                                      <option selected value="Barang Masuk">Barang Masuk</option>
                                      <option value="Tidak Sesuai Stok">Tidak Sesuai Stok</option>
                                      <option value="Kesalahan Produksi">Kesalahan Produksi</option>
                                    </select>
                                  </label>
                                </div>
                                <div class="custom-control custom-radio mt-2">
                                  <input class="custom-control-input" type="radio" id="customRadio2" name="radioKeterangan" value="text">
                                  <label for="customRadio2" class="custom-control-label col-6">
                                    <input type="text" name="keteranganText" class="form-control " placeholder="Keterangan Lain">
                                  </label>
                                </div>
                              </div>
                              <button type="submit" name="update" value="tambah" class="btn btn-info">Tambah</button>
                            </form>
                          </div>
                          <div class="modal-footer justify-content-between">
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <button type="button" class="btn btn-outline-warning mx-2" data-toggle="modal" data-target="#kurang{{$bahanbaku->id}}"><i class="fas fa-minus"></i></button>

                    <div class="modal fade" id="kurang{{$bahanbaku->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-warning">
                            <h4 class="modal-title">Kurang Stok {{$bahanbaku->nama}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="{{ route('bahanbaku.update', $bahanbaku->id) }}">
                              @csrf
                              @method('PUT')
                              <input type="hidden" name="id" value="{{$bahanbaku->id}}">
                              <!-- text input -->
                              <div class="card bg-warning text-center ">
                                <h1 class="card-title mt-2" style="font-size: 1rem;">Stok {{$bahanbaku->nama}} saat ini</h1>
                                <h1 class="card-title mt-3" style="font-size: 3rem;">{{$bahanbaku->jumlah}}<small class="ml-2">{{$bahanbaku->satuan}}</small></h1>
                                <i class="fas fa-cubes fa-3x my-3"></i>
                              </div>
                              <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah" min="1" value="0" max="{{$bahanbaku->jumlah}}" class="form-control" placeholder="Enter ...">
                              </div>
                              <div class="form-group mt-4">
                                <label>Keterangan</label>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio3" name="radioKeterangan" value="select" checked>
                                  <label for="customRadio3" class="custom-control-label col-6">
                                    <select name="keteranganSelect" class="form-control select2" style="width: 100%;">
                                      <option selected="selected">Busuk</option>
                                      <option>Tidak Sesuai Stok</option>
                                      <option>Kesalahan Produksi</option>
                                    </select>
                                  </label>
                                </div>
                                <div class="custom-control custom-radio mt-2">
                                  <input class="custom-control-input" type="radio" id="customRadio4" name="radioKeterangan" value="text">
                                  <label for="customRadio4" class="custom-control-label col-6">
                                    <input name="keteranganText" type="text" class="form-control " placeholder="Keterangan Lain">
                                  </label>
                                </div>
                              </div>
                              <button type="submit" name="update" value="kurang" class="btn btn-warning">Kurang</button>
                            </form>
                          </div>
                          <div class="modal-footer justify-content-between">
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    {{-- button lihat produk --}}
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#lihat{{$bahanbaku->id}}"><i class="far fa-eye mr-2"></i>Lihat Produk</button>
                    {{-- modal resep produk --}}
                    <div class="modal fade" id="lihat{{$bahanbaku->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-secondary">
                            <h4 class="modal-title">Produk dari Bahan Baku {{$bahanbaku->nama_barang}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <table id="example2" class="table table-bordered table-striped">
                              <tbody>
                                <tr>
                                  <td><b>Bahan Baku</b></td>
                                  <td><b>Jumlah</b></td>
                                </tr>
                                @foreach($reseps as $resep)
                                @if ($resep->bahan_baku_id == $bahanbaku->id)
                                <tr>
                                  <td>{{$resep->produk->nama}}</td>
                                  <td>{{$resep->jumlah}} <small>{{$bahanbaku->satuan}}</small></td>
                                </tr>
                                @endif
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer justify-content-between">
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    {{-- end modal resep produk --}}
                  </td>
                </tr>
                @endforeach
              </tbody>
              <!-- <tfoot>
                    <tr>
                      <th>Rendering engine</th>
                      <th>Browser</th>
                      <th>Platform(s)</th>
                      <th>Engine version</th>
                      <th></th>
                    </tr>
                    </tfoot> -->
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-4">
        <div id="accordion">
          <div class="card card-info">
            <div class="card-header">
              <h4 class="card-title w-100">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                  Tambah Data Bahan Baku
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="collapse show" data-parent="#accordion">
              <div class="card-body">
                <form method="POST" action="{{ route('bahanbaku.store') }}">
                  @csrf
                  <div class="form-group">
                    <label for="namabarang">Nama Bahan Baku</label>
                    <input name="nama" type="text" class="form-control" id="namabarang" placeholder="Input Nama Barang">
                  </div>
                  <label>Satuan</label>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="radiosatuan1" name="satuantambah" value="select" checked>
                    <label for="radiosatuan1" class="custom-control-label col-4">
                      <select name="satuanSelect" class="form-control select2" style="width: 100%;">
                        <option selected value="pcs">pcs</option>
                        <option value="kg">kg</option>
                        <option value="gr">gr</option>
                      </select>
                    </label>
                  </div>
                  <div class="custom-control custom-radio my-2">
                    <input class="custom-control-input" type="radio" id="radiosatuan2" name="satuantambah" value="text">
                    <label for="radiosatuan2" class="custom-control-label col-4">
                      <input name="satuanText" type="text" class="form-control " placeholder="Satuan Lain">
                    </label>
                  </div>
                  <!-- /.card-body -->
                  <button type="submit" class="btn btn-outline-info mt-2">Tambah</button>
                </form>
              </div>
            </div>
          </div>
          <div class="card card-warning">
            <div class="card-header">
              <h4 class="card-title w-100">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                  Edit Data Bahan Baku
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
              <div class="card-body">
                <form action="{{ route('bahanbaku.updatedata') }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Nama Bahan Baku</label>
                    <select name="id" class="form-control select2" style="width: 100%;" required>
                      <option selected disabled value="">Pilih bahan baku</option>
                      @foreach ($bahanbakus as $bahanbaku)
                      <option value="{{ $bahanbaku->id }}">{{$bahanbaku->nama}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="namabaru">Nama Baru</label>
                    <input name="nama" type="text" class="form-control" id="namabaru" placeholder="Input Nama Baru Barang">
                  </div>
                  <label>Satuan</label>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="ubahSatuanSelect" name="ubah" value="select" checked>
                    <label for="ubahSatuanSelect" class="custom-control-label col-4">
                      <select name="satuanSelect" class="form-control select2" style="width: 100%;">
                        <option selected value="pcs">pcs</option>
                        <option value="kg">kg</option>
                        <option value="gr">gr</option>
                      </select>
                    </label>
                  </div>
                  <div class="custom-control custom-radio my-2">
                    <input class="custom-control-input" type="radio" id="ubahSatuanText" name="ubah" value="text">
                    <label for="ubahSatuanText" class="custom-control-label col-4">
                      <input name="satuanText" type="text" class="form-control " placeholder="Satuan Lain">
                    </label>
                  </div>
                  <!-- /.card-body -->
                  <button type="submit" class="btn btn-outline-warning bg-gradient mt-2">Ubah</button>
                </form>
              </div>
            </div>
          </div>
          <div class="card card-danger">
            <div class="card-header">
              <h4 class="card-title w-100">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                  Hapus Data Bahan Baku
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="collapse" data-parent="#accordion">
              <div class="card-body">
                <form method="POST" action="{{ route('bahanbaku.destroy') }}">
                  @csrf
                  <div class="form-group">
                    <label>Nama</label>
                    <select name="id" class="form-control select2" style="width: 100%;" required>
                      <option selected disabled value="">Pilih bahan baku</option>
                      @foreach($bahanbakus as $bahanbaku)
                      <option value="{{ $bahanbaku->id }}">{{$bahanbaku->nama}}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- /.card-body -->
                  <button type="submit" class="btn btn-outline-danger bg-gradient">Hapus</button>
                </form>
              </div>
            </div>
          </div>
        </div>
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