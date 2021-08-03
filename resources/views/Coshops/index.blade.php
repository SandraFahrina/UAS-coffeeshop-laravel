@extends('layouts.app')

@section('title', 'coshops')
@section('content')
<a href="/coshops/create" type="button" class="btn btn-primary mb-2 btn-sm">Tambah Minuman</a>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Minuman</th>
      <th scope="col"></th>
      <th scope="col">Size</th>
      <th scope="col">Harga</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($coshops as $coshop)
    <tr>
    <td><a href="/coshops/{{$coshop->id}}" >{{$coshop->nama}}</td>
    <td><img src="{{ url('image') }}/{{$coshop['image']}}" width="150" heigh="200"></img></td>
    <td>{!!$coshop->size !!}</td>
    <td>{!!$coshop->harga !!}</td>
    <td><a href="/coshops/{{$coshop->id}}/edit"><button type="button" class="btn btn-info">Edit</a></button></td>
    <form action="/coshops/{{ $coshop->id}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button class="btn btn-danger">Delete</button></td>
    </form>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
    {{ $coshops -> links() }}
    </div>
@endsection