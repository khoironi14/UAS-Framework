@extends('beranda')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Form Data Pembayaran</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Form Pembayaran</li>
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
                <form action="/pembayaran/store" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Nama Pelanggan</label>
                     <select name="pelanggan_id" class="form-control" id="pelanggan_id">
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
                        <label for="" class="form-label">Bulan</label>
                       <select name="bulan" id="bulan" class="form-control">
                        <option value="">--Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Febuari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                          @error('bulan')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                    </div>
                    <input type="hidden" value="<?=date('Y-m-d')?>" name="tanggal_bayar" id="">
                    <div class="mb-3">
                        <label for="" class="form-label">Jumlah bayar</label>
                        <input type="number"
                          class="form-control @error('jumlah_bayar')  is-invalid
                          @enderror" name="jumlah_bayar" id="jumlah_bayar" aria-describedby="helpId"
                          value="{{old('jumlah_bayar')}}" readonly>
                          @error('jumlah_bayar')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                      </div>
                        <input type="hidden" id="tarif" value="<?=$tarif->tarif?>">

                      <div class="d-grid gap-2">
                        <input type="hidden" name="tahun" value="<?=date('Y')?>">
                        <button type="submit" name="simpan" id="" class="btn btn-primary">Simpan</button>
                      </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('template.script')
<script>
    $(document).ready(function(){

        $('#bulan').change(function(){
            let pelanggan_id=$('#pelanggan_id').val();
        let bulan=$('#bulan').val();
        let tarif=$('#tarif').val();
            $.ajax({

                url:"/pembayaran/show/"+pelanggan_id+"/"+bulan,
                type:"get",
                dataType:"json",
                success:function(data){
                    if(data){
                        $('#jumlah_bayar').val(parseInt(tarif)*data.jumlah_pakai);

                    }else{
                        $('#jumlah_bayar').val(0);
                    }

                }
            })

        });
    })
</script>
  @endsection
