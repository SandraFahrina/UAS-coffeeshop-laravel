@extends('layouts.app')

@section('title', 'create')
@section('content')
<form action="/coshops" method='POST'>
  @csrf
  <div a href=""class="form-group" >
    <label for="exampleInputEmail1">Image</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="image" aria-describedby="emailHelp" value="{{ old('image')}}">
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Minuman</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" value="{{ old('nama')}}">
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">harga</label>
    <input type="text" class="form-control" name="size" id="exampleInputPassword1" value="{{ old('size')}}">
    @error('size')
    <div class="alert alert-danger">{{ $message }}</div>
    <div class="form-group">
    <label for="exampleInputPassword1">Harga</label>
    <input type="text" class="form-control" name="harga" id="exampleInputPassword1" value="{{ old('harga')}}">
    @error('harga')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div a href=""class="form-group" >
    <label for="exampleInputEmail1">Data ID</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="data_id" aria-describedby="emailHelp" value="{{ old('data_id')}}">
    

  </div>
  <button type="submit" class="btn btn-outline-secondary">Tambah</button>
</form>

@endsection