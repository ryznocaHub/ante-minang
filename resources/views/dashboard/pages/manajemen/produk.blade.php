@extends('dashboard.master.master')

@section('title')
Manajemen Produk
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

@section('mb_bj_aktif')
active
@endsection
{{-- end manajemen --}}

@section('page_aktif')
<li class="breadcrumb-item active">@yield('title')</li>
<li class="breadcrumb-item active">Manajemen</li>
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
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Stok</th>
                  <th>Manajemen Stok</th>
                </tr>
              </thead>
              <tbody>
                @foreach($produks as $produk)
                <tr>
                  <td>{{$produk->kode}}</td>
                  <td>{{$produk->nama}}</td>
                  <td>{{$produk->jumlah}} <small>{{$produk->satuan}}</small></td>
                  <td>
                    <!-- Button penambahan stok -->
                    <button type="button" class="btn btn-outline-primary " data-toggle="modal" data-target="#tambah{{$produk->id}}"><i class="fas fa-plus"></i></button>
                    {{-- modal penambahan stok --}}
                    <div class="modal fade" id="tambah{{$produk->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-info">
                            <h4 class="modal-title">Tambah Stok {{$produk->nama}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="{{ route('produk.update', $produk->id) }}">
                              <!-- text input -->
                              @csrf
                              @method('PUT')
                              <input type="hidden" name="id" value="{{$produk->id}}">
                              <input type="hidden" name="satuan" value="{{$produk->satuan}}">
                              <div class="card bg-info text-center ">
                                <h1 class="card-title mt-2" style="font-size: 1rem;">Stok {{$produk->nama}} saat ini</h1>
                                <h1 class="card-title mt-3" style="font-size: 3rem;">{{$produk->jumlah}} <small>{{$produk->satuan}}</small> </h1>
                                <i class="fas fa-cubes fa-3x my-3"></i>
                              </div>
                              <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" min="1" value="0" name="jumlah" class="form-control" placeholder="Enter ...">
                              </div>
                              <div class="form-group mt-4">
                                <label>Keterangan</label>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="radiotambah1" name="radioKeterangan" value="select" checked>
                                  <label for="radiotambah1" class="custom-control-label col-6">
                                    <select name="keteranganSelect" class="form-control select2" style="width: 100%;">
                                      <option selected value="Barang Masuk">Barang Masuk</option>
                                      <option value="Tidak Sesuai Stok">Tidak Sesuai Stok</option>
                                      <option value="Kesalahan Produksi">Kesalahan Produksi</option>
                                    </select>
                                  </label>
                                </div>
                                <div class="custom-control custom-radio mt-2">
                                  <input class="custom-control-input" type="radio" id="radiotambah2" name="radioKeterangan" value="text">
                                  <label for="radiotambah2" class="custom-control-label col-6">
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
                    <!-- /end modal penambahan stok-->

                    {{-- button pengurangan stok --}}
                    <button type="button" class="btn btn-outline-warning mx-2" data-toggle="modal" data-target="#kurang{{$produk->id}}"><i class="fas fa-minus"></i></button>
                    {{-- modal pengurangan stok --}}
                    <div class="modal fade" id="kurang{{$produk->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-warning">
                            <h4 class="modal-title">Kurang Stok {{$produk->nama_barang}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="{{ route('produk.update', $produk->id) }}">
                              @csrf
                              @method('PUT')
                              <input type="hidden" name="id" value="{{$produk->id}}">
                              <input type="hidden" name="satuan" value="{{$produk->satuan}}">
                              <!-- text input -->
                              <div class="card bg-warning text-center ">
                                <h1 class="card-title mt-2" style="font-size: 1rem;">Stok {{$produk->nama_barang}} saat ini</h1>
                                <h1 class="card-title mt-3" style="font-size: 3rem;">{{$produk->jumlah}} <small>{{$produk->satuan}}</small></h1>
                                <i class="fas fa-cubes fa-3x my-3"></i>
                              </div>
                              <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" min="1" value="0" max="{{$produk->jumlah}}" name="jumlah" class="form-control" placeholder="Enter ...">
                              </div>
                              <div class="form-group mt-4">
                                <label>Keterangan</label>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="radiokurang1-{{$produk->id}}" name="radioKeterangan" value="select" checked>
                                  <label for="radiokurang1-{{$produk->id}}" class="custom-control-label col-6">
                                    <select name="keteranganSelect" class="form-control select2" style="width: 100%;">
                                      <option selected="selected">Busuk</option>
                                      <option>Tidak Sesuai Stok</option>
                                      <option>Kesalahan Produksi</option>
                                    </select>
                                  </label>
                                </div>
                                <div class="custom-control custom-radio mt-2">
                                  <input class="custom-control-input" type="radio" id="radiokurang2-{{$produk->id}}" name="radioKeterangan" value="text">
                                  <label for="radiokurang2-{{$produk->id}}" class="custom-control-label col-6">
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
                    <!-- end modal pengurangan stok-->

                    {{-- button lihat resep produk --}}
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#lihat{{$produk->id}}"><i class="far fa-eye mr-2"></i>Lihat Resep</button>
                    {{-- modal resep produk --}}
                    <div class="modal fade" id="lihat{{$produk->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-secondary">
                            <h4 class="modal-title">Resep {{$produk->nama}}</h4>
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
                                @foreach ($reseps as $resep)
                                @if ($resep->produk_id == $produk->id)
                                <tr>
                                  <td>{{$resep->bahanbaku->nama}}</td>
                                  <td>{{$resep->jumlah}} <small>{{$resep->bahanbaku->satuan}}</small></td>
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
                  @endforeach
                </tr>
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
                  Tambah Data Produk
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="collapse show" data-parent="#accordion">
              <div class="card-body">
                <form method="POST" action="{{ route('produk.store') }}">
                  @csrf
                  <div class="form-group">
                    <label for="namabarang">Nama Produk</label>
                    <input name="nama" type="text" class="form-control" id="namabarang" placeholder="Input Nama Produk" required>
                  </div>
                  <label>Satuan</label>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="radiosatuan1" name="satuantambah" value="select" checked>
                    <label for="radiosatuan1" class="custom-control-label col-4">
                      <select name="satuanSelect" class="form-control select2" style="width: 100%;">
                        <option selected="selected">pcs</option>
                        <option>kg</option>
                        <option>gr</option>
                      </select>
                    </label>
                  </div>
                  <div class="custom-control custom-radio my-2">
                    <input class="custom-control-input" type="radio" id="radiosatuan2" name="satuantambah" value="text">
                    <label for="radiosatuan2" class="custom-control-label col-4">
                      <input name="satuanText" type="text" class="form-control " placeholder="Satuan Lain">
                    </label>
                  </div>
                  <label>Bahan Baku</label>
                  <span id="dynamic_tambah">
                    <div class="form-group d-flex" id="bahantambah1">
                      <select name="bahanbaku[1]" class="form-control select2 col-7" style="width: 100%;" required>
                        <option selected disabled value="">Pilih Bahan Baku</option>
                        @foreach ($bahanbakus as $bahanbaku)
                        <option value="{{$bahanbaku->id}}">{{$bahanbaku->nama}} <small>({{$bahanbaku->satuan}})</small></option>
                        @endforeach
                      </select>
                      <input name="jumlah[1]" type="number" min="1" class="form-control col-3 ml-2" placeholder="Jumlah" required>
                    </div>
                  </span>
                  <button type="button" name="addi" id="addi" class="btn btn-info col-12 p-2"><i class="fas fa-plus mr-2"></i>Tambah Bahan Baku</button>
                  <!-- /.card-body -->
                  <button type="submit" class="btn btn-outline-info mt-4">Tambah</button>
                </form>
              </div>
            </div>
          </div>
          <div class="card card-warning">
            <div class="card-header">
              <h4 class="card-title w-100">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                  Edit Data Produk
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label>Nama Produk</label>
                    <select class="form-control select2" style="width: 100%;">
                      <option selected="selected">Singkong</option>
                      <option>Biji Plastik</option>
                      <option>Kreipik Sanjai</option>
                      <option>Plastik</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="namabarang">Nama Baru</label>
                    <input type="text" class="form-control" id="namabaru" placeholder="Input Nama Baru Produk">
                  </div>
                  <label>Satuan</label>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="radiosatuan3" name="satuanedit" value="select" checked>
                    <label for="radiosatuan3" class="custom-control-label col-4">
                      <select name="keteranganSelect" class="form-control select2" style="width: 100%;">
                        <option selected="selected">pcs</option>
                        <option>kg</option>
                        <option>gr</option>
                      </select>
                    </label>
                  </div>
                  <div class="custom-control custom-radio my-2">
                    <input class="custom-control-input" type="radio" id="radiosatuan4" name="satuanedit" value="text">
                    <label for="radiosatuan4" class="custom-control-label col-4">
                      <input name="keteranganText" type="text" class="form-control " placeholder="Satuan Lain">
                    </label>
                  </div>
                  <div class="card card-outline card-warning">
                    <div class="card-body">
                      <label>Bahan Baku</label>
                        <span id="dynamic_edit">
                          <div class="form-group d-flex" id="bahanedit1">
                            <select name="#" class="form-control select2 col-7" style="width: 100%;" required>
                              <option selected disabled value="">Pilih Bahan Baku</option>
                              @foreach ($bahanbakus as $bahanbaku)
                              <option value="{{$bahanbaku->id}}">{{$bahanbaku->nama}} <small>({{$bahanbaku->satuan}})</small></option>
                              @endforeach
                            </select>
                            <input name="edit[2]" type="number" min="1" class="form-control col-3 ml-2" placeholder="Jumlah" required>
                            <button type="button" id="edit1" class="btn btn-tool hps-bahan"><i class="fas fa-times text-danger"> Hapus Bahan</i></button>
                          </div>
                          <div class="form-group d-flex" id="bahanedit1">
                            <select name="#" class="form-control select2 col-7" style="width: 100%;" required>
                              <option selected disabled value="">Pilih Bahan Baku</option>
                              @foreach ($bahanbakus as $bahanbaku)
                              <option value="{{$bahanbaku->id}}">{{$bahanbaku->nama}} <small>({{$bahanbaku->satuan}})</small></option>
                              @endforeach
                            </select>
                            <input name="edit[3]" type="number" min="1" class="form-control col-3 ml-2" placeholder="Jumlah" required>
                            <button type="button" id="edit1" class="btn btn-tool hps-bahan"><i class="fas fa-times text-danger"> Hapus Bahan</i></button>
                          </div>
                          <div class="form-group d-flex" id="bahanedit1">
                            <select name="#" class="form-control select2 col-7" style="width: 100%;" required>
                              <option selected disabled value="">Pilih Bahan Baku</option>
                              @foreach ($bahanbakus as $bahanbaku)
                              <option value="{{$bahanbaku->id}}">{{$bahanbaku->nama}} <small>({{$bahanbaku->satuan}})</small></option>
                              @endforeach
                            </select>
                            <input name="edit[4]" type="number" min="1" class="form-control col-3 ml-2" placeholder="Jumlah" required>
                            <button type="button" id="edit1" class="btn btn-tool hps-bahan"><i class="fas fa-times text-danger"> Hapus Bahan</i></button>
                          </div>
                        </span>
                      <button type="button" name="add" id="add" class="btn btn-warning col-12 p-2"><i class="fas fa-plus mr-2"></i>Tambah Bahan Baku</button>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <button type="submit" class="btn btn-outline-warning bg-gradient">Ubah</button>
                </form>
              </div>
            </div>
          </div>
          <div class="card card-danger">
            <div class="card-header">
              <h4 class="card-title w-100">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                  Hapus Data Produk
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="collapse" data-parent="#accordion">
              <div class="card-body">
                <form method="POST" action="{{ route('produk.destroy') }}">
                  @csrf
                  <div class="form-group">
                    <label>Nama Bahan Baku</label>
                    <select name="id" class="form-control select2" style="width: 100%;" required>
                      <option selected disabled value="">Pilih Produk</option>
                      @foreach($produks as $produk)
                      <option value="{{$produk->id}}">{{$produk->nama}}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- /.card-body -->
                  <button type="submit" class="btn btn-danger bg-gradient">Hapus</button>
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


<script type="text/javascript">
  $(document).ready(function() {
    var j = 1;
    var i = 1;
    $('#addi').click(function() {
      j++;
      $('#dynamic_tambah').append('' +
        '<div class="form-group d-flex" id="bahantambah' + j + '">' +
        '<select name="bahanbaku[' + j + ']" class="form-control select2 col-7" style="width: 100%;" required>' +
        '<option selected disabled value="">Pilih Bahan Baku</option>' +
        '@foreach($bahanbakus as $bahanbaku)' +
        '<option value="{{$bahanbaku->id}}">' + '{{$bahanbaku->nama}} <small>({{$bahanbaku->satuan}})</small>' + '</option>' +
        '@endforeach' + '</select>' +
        '<input type="number" name="jumlah[' + j + ']" min="1" class="form-control col-3 ml-2" placeholder="Jumlah" required>' +
        '<button type="button" id="tambah' + j + '" class="btn btn-tool hps-bahan"><i class="fas fa-times text-danger"> Hapus Bahan</i></button>' +
        '</div>'
      );
    })
    $('#add').click(function() {
      i++;
      //penambahan pemilihan bahan baku tambahan
      $('#dynamic_edit').append('' +
        '<div class="form-group d-flex" id="bahanedit' + i + '">' +
        '<select class="form-control select2 col-7" style="width: 100%;">' +
        '<option selected="selected">Pilih Bahan Baku Baru</option>' +
        '<option>Singkong (kg)</option>' +
        '<option>Biji Plastik (pcs)</option>' +
        '<option>Kreipik Sanjai (gr)</option>' +
        '<option>Plastik (ons)</option>' +
        '</select>' +
        '<input type="text" class="form-control col-3 ml-2" placeholder="Jumlah">' +
        '<button type="button" id="edit' + i + '" class="btn btn-tool hps-bahan"><i class="fas fa-times text-danger"> Hapus Bahan</i></button>' +
        '</div>'
      );
    })
    $(document).on('click', '.hps-bahan', function() {
      var button_id = $(this).attr("id");
      $('#bahan' + button_id + '').remove();
    })
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {


  });
</script>
@endsection