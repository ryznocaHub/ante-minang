@extends('dashboard.master.master')

@section('title')
Manajemen Users
@endsection

{{-- manajemen menu aktif --}}
@section('mu_aktif')
active
@endsection
{{-- end manajemen --}}

@section('page_aktif')
<li class="breadcrumb-item active">Manajemen</li>
<li class="breadcrumb-item active">Users</li>
@endsection

@section('isi')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Tambah User</h3>
    
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form  method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" autocomplete="off" placeholder="Input Username">
                        @error('username')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off" placeholder="Input Password">
                        @error('password')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input name="name" type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Input Nama Lengkap Pegawai">
                        @error('name')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Input Email">
                        @error('email')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Nomor Handphone</label>
                        <input name="no_hp" type="text" value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Input Nomor Handphone">
                        @error('no_hp')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Foto Profil</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input name="foto" type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                          </div>
                          @error('foto')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                          <!-- <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div> -->
                        </div>
                      </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-info">Buat</button>
            </form>
            </div>
            <!-- /.card-body -->
        </div>
        </div>
        <div class="col-4">
          <div class="card card-danger bg-gradient collapsed-card">
            <div class="card-header">
              <h3 class="card-title">Hapus User</h3>
    
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
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
                        <select class="form-control select2" style="width: 100%;">
                          <option selected disabled>Pilih User</option>
                          @foreach($users as $user)
                          <option>{{$user->username}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Fikri Halim Ch" disabled>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="fikrihalim27@gmail.com" disabled>
                      </div>
                      <div class="form-group">
                        <label>Nomor Handphone</label>
                        <input type="text" class="form-control" placeholder="081311308298" disabled>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Foto Profil</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" disabled>
                            <label class="custom-file-label" for="exampleInputFile">Fikri.jpg</label>
                          </div>
                          <!-- <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div> -->
                        </div>
                      </div>
                  </div>
                </div>
            </form>
            <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            <!-- /.card-body -->
          </div>
          <div class="card card-warning bg-gradient collapsed-card">
            <div class="card-header">
              <h3 class="card-title">Edit User</h3>
    
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
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
                        <select class="form-control select2" style="width: 100%;">
                          <option selected disabled>Pilih User</option>
                          @foreach($users as $user)
                          <option>{{$user->username}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control select2" style="width: 100%;">
                          <option selected="selected">Pegawai</option>
                          <option>Resign</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="************">
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
      
      <div class="col-4">
          <!-- general form elements disabled -->
          <div class="card bg-info bg-gradient text-center ">
            <i class="fas fa-users fa-5x mt-5"></i>
            <h1 class="card-title my-5" style="font-size: 5rem;">9</h1>
            <h1 class="card-title mb-5" style="font-size: 2rem;">Pegawai Aktif</h1>
        </div>
      </div>
      <!-- /.card -->
      </div>
      </div>
  </section>
  <!-- /.content -->
@endsection
