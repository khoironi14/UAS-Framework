@extends('beranda')
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pembayaran</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Pembayaran</li>
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
        <div class="card-header"> <a href="/pembayaran/add" class="btn btn-success btn-sm float-right">Tambah Pemakaian</a></div>
        <div class="card-body">
          @include('sweetalert::alert')
          @if(session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('message')}}
            </div>
          @endif
        <div class="table-responsive">

            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th>Pelanggan</th>
                        <th>Bulan</th>
                        <th scope="col">Jumlah Bayar</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayaran as $row )


                    <tr class="">
                        <td>{{$row->nama_pelanggan}}</td>
                        <td>{{$row->bulan}}</td>
                        <td >{{$row->jumlah_bayar}}</td>

                        <td> <form action="/pemakaian/delete/{{$row->id}}" method="post" class="d-inline">
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
