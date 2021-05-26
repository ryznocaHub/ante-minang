@extends('dashboard.master.master')

@section('title')
Profil
@endsection

@section('page_aktif')
<li class="breadcrumb-item active">Profil</li>
@endsection

@section('isi')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h1 class="lead"><b>Fikri Halim Ch</b></h1>
                                <span class="text-muted text-sm"><b>Username: </b> Ryznoca</span>
                                <p class="text-muted text-sm"><b>Jabatan : </b> Pegawai </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li ><span class="fa-li"><i class="far fa-envelope"></i></span> fikrihalim27@gmail.com</li>
                                    <li ><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>+6281311308298</li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img src="../../dist/img/fik.jpeg" alt="user-avatar" class="img-circle img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="#" class="btn btn-sm btn-outline-info">
                                <i class="fas fa-user-edit mr-2"></i>Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-6">
                <div class="card card-warning">
                    <div class="card-header">
                      <h3 class="card-title">Edit Profil</h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form>
                            <div class="row">
                              <div class="col-sm-12">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Ryznoca" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" class="form-control" placeholder="input Password">
                                  </div>
                                  <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control" placeholder="input Password">
                                  </div>
                                  <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" placeholder="input Password">
                                  </div>
                                  <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" placeholder="Fikri Halim Ch">
                                  </div>
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="fikrihalim27@gmail.com">
                                  </div>
                                  <div class="form-group">
                                    <label>Nomor Handphone</label>
                                    <input type="text" class="form-control" placeholder="081311308298">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputFile">Foto Profil</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                      </div>
                                      <!-- <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                      </div> -->
                                    </div>
                                  </div>
                              </div>
                            </div>
                        </form>
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection
