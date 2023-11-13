@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Postingan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Postingan</li>
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
          
            
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
    
            <a href="{{ route('admin.create-post')}}">
              <button type="button" class="btn btn-primary"><i class="fas fa-plus"> Tambah</i></button> <br><br>
            </a>
    
            <div class="row">
              <div class="col-12">
                <div class="card">
    
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Gambar</th>
                          <th>Judul</th>
                          <th>Konten</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($posts as $p)
                      
                          
                        
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td><img src="{{ asset('/storage/posts/'.$p->image) }}" class="rounded" style="width: 150px"></td>
                          <td>{{ $p->title }}</td>
                          <td>{{ $p->content }}</td>
                          <td>

                       
                            <a class="btn btn-success btn-sm" href="{{ route('admin.detail-post',['id' => $p->id])}}">
                            <i class="fas fa-eye"> Lihat</i>
                            </a>
                            
                            <a class="btn btn-primary btn-sm" href="{{route('admin.edit-post',['id' => $p->id]) }}">
                              <i class="fas fa-edit"> Edit</i>
                            </a>
                            
                            <a class="btn btn-danger btn-sm" href="{{route('admin.delete-post',['id' => $p->id]) }}">
                              <i class="fas fa-trash">  Hapus</i>
                            </a></td>
                        </tr>
                        @endforeach
                      </tbody>
                      {{ $posts->links() }}
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection