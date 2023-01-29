@extends('beranda')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Form Data Pemakaian</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Form Pemakaian</li>
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
                <form action="/pemakaian/store" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Nama Pelanggan</label>
                     <select name="pelanggan_id" class="form-control" id="">
                        @foreach ($pelanggan as $row )
                        <option value="{{$row->id}}">{{$row->nama_pelanggan}}</option>
                        @endforeach
                       
                     </select>
                        @error('pelanggan_id')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Jumlah Pakai</label>
                        <input type="number"
                          class="form-control @error('jumlah_pakai')  is-invalid
                          @enderror" name="jumlah_pakai" id="" aria-describedby="helpId" placeholder="Input Pemakaian"
                          value="{{old('jumlah_pakai')}}">
                          @error('jumlah_pakai')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Bulan</label>
                       <select name="bulan" id="" class="form-control">

                        <option value="01">Januari</option> 
                        <option value="02">Febuari</option>   
                        <option value="03">Maret</option>  
                        <option value="04">April</option> 
                        <option value="05">Mei</option> 
                    </select>
                          @error('bulan')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                      </div>
                      <div class="d-grid gap-2">
                        <button type="submit" name="simpan" id="" class="btn btn-primary">Simpan</button>
                      </div>
                </form>
            </div>
        </div>
    </div>
</div>


  @endsection