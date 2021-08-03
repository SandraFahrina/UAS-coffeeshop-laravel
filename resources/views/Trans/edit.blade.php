@extends('layouts.app')

@section('title', 'Trans')
@section('content')
<form action="/trans/{{ $t['id'] }}" method='POST'>
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Pelanggan</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ old('name') ? old('name') : $t['name']}}">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Minuman</label>
    <input type="text" class="form-control" name="minuman" id="exampleInputPassword1" value="{{ old('minuman') ? old('minuman') : $t['minuman']}}">
    @error('minuman')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Size</label>
    <input type="text" class="form-control" name="ukuran" id="exampleInputPassword1" value="{{ old('size') ? old('size') : $t['size']}}">
    @error('size')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Jumlah</label>
    <input type="text" class="form-control" name="jmlh" id="exampleInputPassword1" value="{{ old('jmlh') ? old('jmlh') : $t['jmlh']}}">
    @error('jmlh')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Harga</label>
    <input type="text" class="form-control" name="price" id="exampleInputPassword1" value="{{ old('price') ? old('price') : $t['price']}}">
    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <button type="submit" class="btn btn-outline-secondary">Edit Pesanan</button>
</form>

@endsection