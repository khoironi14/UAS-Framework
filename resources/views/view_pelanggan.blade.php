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
            <li class="breadcrumb-item"><a href="/pelanggan">Data Pelanggan</a></li>

          </ol>
        </div><!-- /.col -->
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
                        <td><a href="" class="btn btn-info btn-sm">Edit</a> <a href="/" class="btn btn-danger btn-sm">Hapus</a></td>
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