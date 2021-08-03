@extends('layouts.app')

@section('title', 'create')
@section('content')
<form action="/trans" method='POST'>
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Pelanggan</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ old('name')}}">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Minuman</label>
    <input type="text" class="form-control" name="minuman" id="exampleInputPassword1" value="{{ old('minuman')}}">
    @error('minuman')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Size</label>
    <input type="text" class="form-control" name="size" id="exampleInputPassword1" value="{{ old('size')}}">
    @error('size')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Jumlah</label>
    <input type="text" class="form-control" name="jmlh" id="exampleInputPassword1" value="{{ old('jmlh')}}">
    @error('jmlh')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Harga</label>
    <input type="text" class="form-control" name="price" id="exampleInputPassword1" value="{{ old('price')}}">
    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Groups ID</label>
    <input type="text" class="form-control" name="groups_id" id="exampleInputPassword1" value="{{ old('groups_id')}}">
    @error('groups_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

  </div>
  <button type="submit" class="btn btn-outline-secondary">Tambah</button>
</form>

@endsection