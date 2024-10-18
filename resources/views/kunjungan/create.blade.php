@extends('layout.app')

@section('title', 'Tambah Kunjungan')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Kunjungan</h1>
    
    <form action="{{ route('kunjungan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Pengunjung</label>
            <input type="text" name="nama_pengunjung" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tanggal Kunjungan</label>
            <input type="date" name="tanggal_kunjungan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type" class="form-label">Keperluan</label>
            <div class="col-sm-10 p-0">
                <select class="form-select form-control" name="type" id="type">
                    <option selected disabled hidden>Pilih</option>
                    <option value="Membaca Buku">Membaca Buku</option>
                    <option value="Meminjam / Mengembalikan Buku">Meminjam / Mengembalikan Buku</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
    </form>
</div>
@endsection
