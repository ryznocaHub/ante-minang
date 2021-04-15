@extends('dashboard.master.master')

@section('title')
  Manajemen Barang
@endsection
    
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('css/Template/table/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/Template/table/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/Template/table/buttons.bootstrap4.min.css') }}">
@endsection

{{-- manajemen menu aktif --}}
@section('mb_aktif')
 active
@endsection
{{-- end manajemen --}}

@section('page_aktif')
 <li class="breadcrumb-item active">@yield('title')</li>
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
                  <th>Nama</th>
                  <th>Stok</th>
                  <th>Kategori</th>
                  <th>Manajemen Stok</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Singkong</td>
                  <td>20</td>
                  <td>Bahan Baku</td>
                  <td>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i></button>

                      <div class="modal fade" id="tambah">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-info">
                              <h4 class="modal-title">Tambah Stok Singkong</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <!-- text input -->
                                <div class="card bg-info text-center ">
                                  <h1 class="card-title mt-2" style="font-size: 1rem;">Stok Singkong saat ini</h1>
                                  <h1 class="card-title mt-3" style="font-size: 3rem;">9999999</h1>
                                  <i class="fas fa-cubes fa-3x my-3"></i>
                                </div>
                                <div class="form-group">
                                  <label>Jumlah</label>
                                  <input type="text" class="form-control" placeholder="Enter ...">
                                </div>
                                <div class="form-group mt-4">
                                  <label>Keterangan</label>
                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" checked>
                                    <label for="customRadio1" class="custom-control-label col-6">
                                      <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Barang Masuk</option>
                                        <option>Tidak Sesuai Stok</option>
                                        <option>Kesalahan Produksi</option>
                                      </select>
                                    </label>
                                  </div>
                                  <div class="custom-control custom-radio mt-2">
                                    <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                                    <label for="customRadio2" class="custom-control-label col-6">
                                      <input type="text" class="form-control " placeholder="Keterangan Lain">
                                    </label>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-info">Tambah</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                      <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#kurang"><i class="fas fa-minus"></i></button>

                      <div class="modal fade" id="kurang">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-warning">
                              <h4 class="modal-title">Kurang Stok Singkong</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <!-- text input -->
                                <div class="card bg-warning text-center ">
                                  <h1 class="card-title mt-2" style="font-size: 1rem;">Stok Singkong saat ini</h1>
                                  <h1 class="card-title mt-3" style="font-size: 3rem;">9999999</h1>
                                  <i class="fas fa-cubes fa-3x my-3"></i>
                                </div>
                                <div class="form-group">
                                  <label>Jumlah</label>
                                  <input type="text" class="form-control" placeholder="Enter ...">
                                </div>
                                <div class="form-group mt-4">
                                  <label>Keterangan</label>
                                  <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio3" name="custom" checked>
                                    <label for="customRadio3" class="custom-control-label col-6">
                                      <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Busuk</option>
                                        <option>Tidak Sesuai Stok</option>
                                        <option>Kesalahan Produksi</option>
                                      </select>
                                    </label>
                                  </div>
                                  <div class="custom-control custom-radio mt-2">
                                    <input class="custom-control-input" type="radio" id="customRadio4" name="custom">
                                    <label for="customRadio4" class="custom-control-label col-6">
                                      <input type="text" class="form-control " placeholder="Keterangan Lain">
                                    </label>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-warning">Kurang</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                  </td>
                </tr>
                <tr>
                  <td>Keripik Sanjai</td>
                  <td>40</td>
                  <td>Produk</td>
                  <td>
                      <!-- <a href="#" type="button" class="btn btn-primary"><i class="far fa-eye"></i></a> -->
                      <a type="button" class="btn btn-outline-primary"><i class="fas fa-plus"></i></a>
                      <a type="button" class="btn btn-outline-warning"><i class="fas fa-minus"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Biji Plastik</td>
                  <td>43</td>
                  <td>Barang</td>
                  <td>
                      <!-- <a type="button" class="btn btn-primary"><i class="far fa-eye"></i></a> -->
                      <a type="button" class="btn btn-outline-primary"><i class="fas fa-plus"></i></a>
                      <a type="button" class="btn btn-outline-warning"><i class="fas fa-minus"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Plastik</td>
                  <td>60</td>
                  <td>Barang</td>
                  <td>
                      <!-- <a type="button" class="btn btn-primary"><i class="far fa-eye"></i></a> -->
                      <a type="button" class="btn btn-outline-primary"><i class="fas fa-plus"></i></a>
                      <a type="button" class="btn btn-outline-warning"><i class="fas fa-minus"></i></a>
                  </td>
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
          <div class="card card-info ">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Barang</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form>
                      <div class="form-group">
                          <label for="namabarang">Nama Barang</label>
                          <input type="text" class="form-control" id="namabarang" placeholder="Input Nama Barang">
                          </div>
                          <div class="form-group">
                          <label for="kategori">Kategori</label>
                          <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Bahan Baku</option>
                            <option>Produk</option>
                            <option>Barang</option>
                          </select>
                      </div>
                      <!-- /.card-body -->
                      <button type="submit" class="btn btn-info">Tambah</button>
                  </form>
              </div>
              <!-- /.card-body -->
          </div>
          <div class="card card-warning bg-gradient collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Ubah Data Barang</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form>
                      <div class="form-group">
                          <label>Nama Barang</label>
                          <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Singkong</option>
                            <option>Biji Plastik</option>
                            <option>Kreipik Sanjai</option>
                            <option>Plastik</option>
                          </select>
                      </div>

                      <div class="form-group">
                        <label for="namabarang">Nama Baru</label>
                        <input type="text" class="form-control" id="namabaru" placeholder="Input Nama Baru Barang">
                      </div>
                      <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control select2" style="width: 100%;">
                          <option selected="selected"> </option>
                          <option>Bahan Baku</option>
                          <option>Produk</option>
                          <option>Barang</option>
                        </select>
                      </div>
                      <!-- /.card-body -->
                      <button type="submit" class="btn btn-warning bg-gradient">Ubah</button>
                  </form>
              </div>
              <!-- /.card-body -->
          </div>
          <div class="card card-danger bg-gradient collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Hapus Data Barang</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form>
                      <div class="form-group">
                          <label>Nama Barang</label>
                          <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Singkong</option>
                            <option>Biji Plastik</option>
                            <option>Kreipik Sanjai</option>
                            <option>Plastik</option>
                          </select>
                      </div>
                      <!-- /.card-body -->
                      <button type="submit" class="btn btn-danger bg-gradient">Hapus</button>
                  </form>
              </div>
              <!-- /.card-body -->
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