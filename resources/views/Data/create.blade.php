@extends('layouts.app')

@section('title', 'create')
@section('content')
<form action="/data" method='POST'>
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ old('name')}}">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  
  <button type="submit" class="btn btn-outline-secondary">Tambah</button>
</form>

@endsection