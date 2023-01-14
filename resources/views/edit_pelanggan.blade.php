@extends('beranda')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>Form Data Pelanggan</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Form Pelanggan</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->

  @endsection
  @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="/pelanggan/updated/{{$edit->id}}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Nama Pelanggan</label>
                      <input type="text"
                        class="form-control @error('name_pelanggan')  is-invalid
                        @enderror" name="nama_pelanggan" id="" aria-describedby="helpId" placeholder="Nama Pelanggan"
                       value="{{old('name_pelanggan',$edit->nama_pelanggan)}}">
                        @error('name_pelanggan')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat  Pelanggan</label>
                        <input type="text"
                          class="form-control @error('alamat')  is-invalid
                          @enderror" name="alamat" id="" aria-describedby="helpId" placeholder="Input Alamat"
                          value="{{old('alamat',$edit->alamat)}}">
                          @error('alamat')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Nomor Hp Pelanggan</label>
                        <input type="text"
                          class="form-control @error('nomer_hp') is-invalid
                          @enderror" name="nomer_hp" id="" aria-describedby="helpId" placeholder="Input Nomer Hp"
                           value="{{old('nomer_hp',$edit->nomer_hp)}}">
                          @error('nomer_hp')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                      </div>
                      <div class="d-grid gap-2">
                        <button type="submit" name="simpan"  class="btn btn-primary">Simpan</button>
                      </div>
                </form>
            </div>
        </div>
    </div>
</div>


  @endsection