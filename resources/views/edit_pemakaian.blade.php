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
                <form action="/pemakaian/update/{{$edit->id}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                      <label for="" class="form-label">Nama Pelanggan</label>
                     <select name="pelanggan_id" class="form-control" id="">
                        @foreach ($pelanggan as $row )
                        <option value="{{$row->id}}" @if ($edit->pelanggan_id==$row->id)
                            {{"selected";}}
                        @endif>{{$row->nama_pelanggan}}</option>
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
                          value="{{old('jumlah_pakai',$edit->jumlah_pakai)}}">
                          @error('jumlah_pakai')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Bulan</label>
                       <select name="bulan" id="" class="form-control">

                        <option value="01" @if ($edit->bulan=='01')
                            {{"selected"}}
                        @endif>Januari</option>
                        <option value="02" @if ($edit->bulan=='02')
                            {{"selected"}}
                        @endif>Febuari</option>
                        <option value="03" @if ($edit->bulan=='03')
                            {{"selected"}}
                        @endif>Maret</option>
                        <option value="04" @if ($edit->bulan=='04')
                            {{"selected"}}
                        @endif>April</option>
                        <option value="05" @if ($edit->bulan=='05')
                            {{"selected"}}
                        @endif>Mei</option>
                        <option value="06" @if ($edit->bulan=='06')
                            {{"selected"}}
                        @endif>Juni</option>
                        <option value="07" @if ($edit->bulan=='07')
                            {{"selected"}} @endif>Juli</option>
                        <option value="08" @if ($edit->bulan=='08')
                            {{"selected"}} @endif>Agustus</option>
                        <option value="09" @if ($edit->bulan=='09')
                            {{"selected"}} @endif>September</option>
                        <option value="10" @if ($edit->bulan=='10')
                            {{"selected"}} @endif>Oktober</option>
                        <option value="11" @if ($edit->bulan=='11')
                            {{"selected"}} @endif>November</option>
                        <option value="12" @if ($edit->bulan=='12')
                            {{"selected"}} @endif>Desember</option>
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
