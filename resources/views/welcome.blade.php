@extends('layouts.store')

@section('title', 'Toko Laravel')

@section('sidebar')
  <x-sidebar></x-sidebar>
@endsection

@section('content')
  @auth
    <x-header>Halo, {{ auth()->user()->name }}!</x-header>
  @endauth
    <h2 class="text-xl text-white mx-2.5">Bingung barang bekas mau di kemanain? <br>dijual bingung siapa yang mau, dibuang sayang.. <br>Taruh aja di sini! caranya gampang, tinggal klik Jual atau Jual Barang kemudian isi field yang wajib diisi lalu submit, selesai deh. :D</h2>
@endsection