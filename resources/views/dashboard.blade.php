@extends('layout.app')
@section('title', 'dashboard')
@section('content')
@if (Session::get('success'))
<div class="alert alert-success">
{{ Session::get('success')}}</div>
@endif        
<div class="jumbotron py-4 px-5">
    @if(Auth::check())
        <h1 class="display-4">Selamat Datang {{ Auth::user()->name }}</h1>
    @else
        <h1 class="display-4">Selamat Datang Pengunjung</h1>
        <p>Silakan login untuk mengakses aplikasi ini.</p>
    @endif
    <hr class="my-4">
    <p>Aplikasi ini digunakan hanya oleh pegawai perpustakaan.</p>
</div>

@endsection