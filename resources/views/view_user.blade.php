@extends('beranda')
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data User</li>
          </ol>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header"> <a href="/user/add" class="btn btn-success btn-sm float-right">Tambah User</a></div>
        <div class="card-body">
          @include('sweetalert::alert')

        <div class="table-responsive">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th scope="col">Nama User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $row )


                    <tr class="">
                        <td >{{$row->name}}</td>
                        <td >{{$row->email}}</td>
                        <td >@if ($row->role==1)
                            Admin
                            @elseif ($row->role==2)
                            Kasir
                        @elseif($row->role==3)
                            Pelanggan
                            @else
                            Pencatat Meter
                        @endif</td>
                        <td><a href="/user/edit/{{$row->id}}" class="btn btn-info btn-sm">Edit</a> <form action="/user/delete/{{$row->id}}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Yakin akan Hapus Data?')">Hapus</button>
                      </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



        </div>
      </div>


    </div>

    <!-- /.col-md-6 -->
  </div>

@endsection
