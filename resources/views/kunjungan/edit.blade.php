@extends('layout.app')

@section('title', 'Edit Kunjungan')

@section('content')
    <h1>Edit Kunjungan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kunjungan.update', $kunjungan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Pengunjung</label>
            <input type="text" name="nama_pengunjung" class="form-control" value="{{ old('nama_pengunjung', $kunjungan->nama_pengunjung) }}">
        </div>
        <div class="form-group">
            <label>Keperluan</label>
            <input type="text" name="keperluan" class="form-control" value="{{ old('keperluan', $kunjungan->keperluan) }}">
        </div>
        <div class="form-group">
            <label>Waktu Kunjungan</label>
            <input type="datetime-local" name="waktu_kunjungan" class="form-control" value="{{ old('waktu_kunjungan', $kunjungan->waktu_kunjungan) }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
