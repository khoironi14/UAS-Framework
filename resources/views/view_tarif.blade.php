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
        <div class="card-header"> <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
            Input Tarif
          </button></div>
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
                        <th scope="col">Tarif</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($tarif as $row )


                    <tr class="">
                        <td >{{$row->tarif}}</td>


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
  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/tarif/store" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Tarif /m</label>
                    <input type="text" name="tarif" class="form-control" id="" required>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection
