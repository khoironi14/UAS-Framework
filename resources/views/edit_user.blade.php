@extends('beranda')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>Form Data User</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Form User</li>
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
                <form action="/user/updated/{{$edit->id}}" method="post">
                   
                    @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Nama User</label>
                      <input type="text"
                        class="form-control @error('name')  is-invalid
                        @enderror" name="name" id="" aria-describedby="helpId" placeholder="Nama Pelanggan"
                       value="{{old('name',$edit->name)}}">
                        @error('name')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text"
                          class="form-control @error('email')  is-invalid
                          @enderror" name="email" id="" aria-describedby="helpId" placeholder="Input Email"
                          value="{{old('email',$edit->email)}}">
                          @error('email')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                      </div>
                     
                     
                      <div class="mb-3">
                        <label for="" class="form-label">Role</label>
                       <select name="role" id="" class="form-control">
                        <option value="1" @if ($edit->role==1)
                           {{"selected";}} 
                        @endif>Admin</option>
                        <option value="2" @if ($edit->role==2)
                            {{"selected";}} 
                         @endif>Kasir</option>
                        <option value="3" @if ($edit->role==3)
                            {{"selected";}} 
                         @endif>Pelanggan</option>
                       </select>
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