@extends('layouts.app')

@section('title', 'Transaksi')
@section('content')
<a href="/trans/create" type="button" class="btn btn-primary mb-2 btn-sm">Tambah Transaksi</a>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nama Pelanggan</th>
      <th scope="col">Minuman</th>
      <th scope="col">Size</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($trans as $tran)
    <tr>
    <td>{{$tran->name}}</td>
    <td>{!!$tran->minuman !!}</td>
    <td>{!!$tran->ukuran !!}</td>
    <td>{!!$tran->jmlh !!}</td>
    <td>{!!$tran->price !!}</td>
    <td><a href="/trans/{{$tran->id}}/edit"><button type="button" class="btn btn-info">Edit</a></button></td>
    <form action="/trans/{{$tran->id}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button class="btn btn-danger">Delete</button></td>
    </form>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
    {{ $trans -> links() }}
    </div>
@endsection