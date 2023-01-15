@extends('beranda')
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pelanggan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Pelanggan</li>
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
        <div class="card-header"> <a href="/pelanggan/add" class="btn btn-success btn-sm float-right">Tambah Pelanggan</a></div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomer Hp</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $row )
                        
                  
                    <tr class="">
                        <td >{{$row->nama_pelanggan}}</td>
                        <td >{{$row->alamat}}</td>
                        <td >{{$row->nomer_hp}}</td>
                        <td><a href="/pelanggan/edit/{{$row->id}}" class="btn btn-info btn-sm">Edit</a> <form action="/pelanggan/delete/{{$row->id}}" method="post" class="d-inline">
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