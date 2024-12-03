@extends('layout.app')

@section('title', 'Edit Kunjungan')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Kunjungan</h1>

    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <form action="{{ route('kunjungan.update', $kunjungan->id) }}" method="POST">
        @csrf
        @method('PATCH')
        
        <div class="mb-3">
            <label for="nama_pengunjung" class="form-label">Nama Pengunjung</label>
            <input type="text" class="form-control" id="nama_pengunjung" name="nama_pengunjung" value="{{ $kunjungan->nama_pengunjung }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
            <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan" value="{{ $kunjungan->tanggal_kunjungan }}" required>
        </div>

        <div class="mb-3">
            <label for="keperluan" class="form-label">Keperluan</label>
            <input type="text" class="form-control" id="keperluan" name="keperluan" value="{{ $kunjungan->keperluan }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Kunjungan</button>
        <a href="{{ route('kunjungan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection