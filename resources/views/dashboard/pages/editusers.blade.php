@extends('dashboard.master.master')

@section('title')
Manajemen Users
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('css/Template/table/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/Template/table/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/Template/table/buttons.bootstrap4.min.css') }}">
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
                        <input id="exampleInputFile"  name="foto" type="file">
                        {{-- <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label> --}}
                      </div>
                      @error('foto')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                      @enderror
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
        <div id="accordion">
          <div class="card card-warning">
            <div class="card-header">
              <h4 class="card-title w-100">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                  Edit Data User
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
              <div class="card-body">
                <form action="{{route('users.update')}}" method="POST"> 
                  @csrf
                  <div class="form-group">
                    <label>Username</label>
                    <select name="id" class="form-control select2 dropdownproduk" style="width: 100%;" required>
                      <option selected disabled value="">Pilih Username</option>
                      @foreach($users as $user)
                        <option value="{{ $user->id }}">{{$user->username}}</option>
                      @endforeach
                    </select>
                    {{-- <div class="loading"></div> --}}
                  </div>
                  <div id="radio"></div>
                  {{-- <span id="dynamic_bahan"></span>
                  <button type="button" name="add" id="add" class="btn btn-warning col-12 p-2"><i class="fas fa-plus mr-2"></i>Tambah Bahan Baku</button> --}}
                </form>
              </div>
            </div>
          </div>
          {{-- <div class="card card-danger">
            <div class="card-header">
              <h4 class="card-title w-100">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                  Hapus Data User
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="collapse" data-parent="#accordion">
              <div class="card-body">
                <form method="POST" action="{{ route('produk.destroy') }}">
                  @csrf
                  <div class="form-group">
                    <label>Username</label>
                    <select name="id" class="form-control select2 dropdownhapus" style="width: 100%;" required>
                      <option selected disabled value="">Pilih Username</option>
                      @foreach($users as $user)
                        <option value="{{ $user->id }}">{{$user->username}}</option>
                      @endforeach
                    </select>
                  </div>
                  <button type="submit" class="btn btn-outline-danger bg-gradient mt-3" id="buttonhapus" disabled>Hapus</button>
                  <!-- /.card-body -->
                </form>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
      </div>
      <!-- /.card -->
      </div>
  </div>
</section>
<!-- /.content -->
@endsection

@section('js_bawah')
<!-- bs-custom-file-input -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('change','.dropdownproduk',function(){
      // console.log("masukpertama");
      preLoad("#radio","text-warning","7x");
      var idUser = $(this).val();
      // alert(idUser);
      $.ajax({
        type      :'get',
        url       :'{{ URL::route('getdatauser') }}',
        data      :{'id':idUser},
        dataType  :'JSON',
        success:function(dataUser){
          console.log(dataUser)
          afterLoad("#radio");
          $('#radio').append(''+
          '<div class="form-group">' +
            '<label>Nama Lengkap</label>' +
            '<input type="text" name="name" class="form-control produk-ganti" value="'+dataUser.name+'" >' +
          '</div>' +
          '<div class="form-group">' +
            '<label>Password</label>' +
            '<input name="password" type="password" class="form-control autocomplete="off" value="'+dataUser.password+'">' +
          '</div>' +
          '<div class="form-group">' +
            '<label>Jabatan</label>' +
            '<select id="jabatan" name="status" class="form-control select2 produk-ganti" style="width: 100%;">' +
              '<option id="pegawai" value="Pegawai">Pegawai</option>' +
              '<option id="resign" value="Resign">Resign</option>' +
            '</select>' +
          '</div>' +
          '<div class="form-group">' +
            '<label>Email</label>' +
            '<input type="email" name="email" class="form-control produk-ganti" value="'+dataUser.email+'" >' +
          '</div>' +
          '<div class="form-group">' +
            '<label>Nomor Handphone</label>' +
            '<input type="text" name="no_hp" class="form-control produk-ganti" value="'+dataUser.no_hp+'" >' +
          '</div>' +
          '<input type="hidden" value="'+dataUser.foto+'" name="oldfoto">' +
          '<button type="submit" class="btn btn-outline-warning bg-gradient mt-3" id="buttonedit" disabled>Ubah</button>'
          );

          if(dataUser.jabatan == "pegawai"){
        $('#pegawai').attr("selected",true)
      }else{
        $('#pegawai').attr("selected",true)
      }
        },
        error:function(){
          console.log("error");
          
        }
      });
    });

    // Pengaturan tombol edit agar tidak dapat dipencet jika belum mengganti isi form
    $(document).on('change','.produk-ganti', function () {
      $('#buttonedit').attr("disabled",false)
    });
  });
</script>
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