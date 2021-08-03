@extends('layouts.app')

@section('title', 'create')
@section('content')
<form action="/drinks/{{ $drink['id'] }}" method='POST'>
  @csrf
  @method('PUT')
  <div a href=""class="form-group" >
    <label for="exampleInputEmail1">Image</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="image" aria-describedby="emailHelp" value="{{ old('image')}}">
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Minuman</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" value="{{ old('nama') ? old('nama') : $drink['nama']}}">
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Size</label>
    <input type="text" class="form-control" name="size" id="exampleInputPassword1" value="{{ old('size') ? old('size') : $drink['size']}}">
    @error('size')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Harga</label>
    <input type="text" class="form-control" name="harga" id="exampleInputPassword1" value="{{ old('harga') ? old('harga') : $drink['harga']}}">
    @error('harga')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <button type="submit" class="btn btn-outline-secondary">Edit</button>
</form>

@endsection