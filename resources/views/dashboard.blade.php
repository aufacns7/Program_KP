@extends('layout.main');
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <a href="{{ route('admin.main_dashboard') }}" class=".btn.btn-app">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data User</span>
                  <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
          </div>
              <!-- /.info-box -->
                <div class="col-12 col-sm6 col-md-3">
                  <a href="{{ route('admin.postingan') }}" class=".btn.btn-app">
                    <div class="info-box mb-3">
                      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Postingan</span>
                        <span class="info-box-number"></span>
                      </div>
              </a>  
            </div>
    <!-- /.content -->
  </div>
      </div>
    <div>
    </div>
    <div>
    </div>
@endsection