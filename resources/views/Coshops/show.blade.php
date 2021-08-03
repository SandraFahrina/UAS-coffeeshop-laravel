@extends('layouts.app')

@section('title', 'Coshopss')
@section('content')
    <div class="card">
    <h3><img src="{{ url('image') }}/{{$coshop['image']}}" width="150" heigh="200"></img></h3>
    <h3>Nama Minuman : {{ $coshop['nama'] }}</h3>
    <h3>Size Minuman : {{ $coshop['size'] }}</h3>
    </div>
    
@endsection
   