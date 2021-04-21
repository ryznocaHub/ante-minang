@extends('dashboard.master.master')

@section('title')
List Users
@endsection

{{-- manajemen menu aktif --}}
@section('is_aktif')
active
@endsection
{{-- end manajemen --}}

@section('page_aktif')
<li class="breadcrumb-item active">List</li>
<li class="breadcrumb-item active">Users</li>
@endsection

@section('isi')
<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body pb-0">
      <div class="row">
        @foreach($users as $user)
        <!-- user wrapper -->
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
          <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h1 class="lead"><b>{{$user->name}}</b></h1>
                  <span class="text-muted text-sm"><b>Username: </b> {{$user->username}}</span>
                  <p class="text-muted text-sm"><b>Jabatan : </b> {{$user->jabatan}} </p>
                  <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li><span class="fa-li"><i class="far fa-envelope"></i></span> {{$user->email}}</li>
                    <li><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>{{$user->no_hp}}</li>
                  </ul>
                </div>
                <div class="col-5 text-center">
                  <img src="{{$user->foto}}" alt="user-avatar" class="rounded-circle" width="100%" height="100%">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <!-- <div class="text-right">
                  <a href="#" class="btn btn-sm btn-outline-info">
                      <i class="fas fa-user-edit mr-2"></i>Edit
                  </a>
                  <a href="#" class="btn btn-sm btn-outline-danger">
                      <i class="fas fa-user-times mr-2"></i>Hapus
                  </a>
                </div> -->
            </div>
          </div>
        </div>
        <!-- end user -->
        @endforeach
      </div>
    </div>
    <!-- /.card-body -->
    <!-- <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
          <ul class="pagination justify-content-center m-0">
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item"><a class="page-link" href="#">6</a></li>
            <li class="page-item"><a class="page-link" href="#">7</a></li>
            <li class="page-item"><a class="page-link" href="#">8</a></li>
          </ul>
        </nav>
      </div> -->
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
@endsection