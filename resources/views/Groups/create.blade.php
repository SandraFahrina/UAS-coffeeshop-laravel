@extends('layouts.app')

@section('title', 'create')
@section('content')
<form action="/groups" method='POST'>
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Keterangan</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="ket" aria-describedby="emailHelp" value="{{ old('ket')}}">
    @error('ket')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <button type="submit" class="btn btn-outline-secondary">Tambah</button>
</form>

@endsection