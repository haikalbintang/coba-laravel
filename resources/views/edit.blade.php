@extends('layouts.store')

@section('sidebar')
  <x-sidebar></x-sidebar>
@endsection

@section('content')
  @include('form', ['product' => $product])
@endsection