@extends('layouts.app')

@section('title', 'groups')
@section('content')
<form action="/groups/{{ $group['id'] }}" method='POST'>
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Keterangan</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="ket" aria-describedbzy="emailHelp" value="{{ old('ket') ? old('ket') : $group['ket']}}">
    @error('ket')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

  <button type="submit" class="btn btn-outline-secondary">Edit</button>
</form>

@endsection