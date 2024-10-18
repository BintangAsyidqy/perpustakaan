@extends('layout.app')

@section('title', 'Daftar Kunjungan')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Kunjungan Perpustakaan</h1>
    
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <a href="{{ route('kunjungan.tambah') }}" class="btn btn-primary mb-3">Tambah Kunjungan</a>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengunjung</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Keperluan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($kunjungans as $index => $kunjungan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kunjungan->nama_pengunjung }}</td>
                    <td>{{ $kunjungan->tanggal_kunjungan }}</td>
                    <td>{{ $kunjungan->keperluan }}</td>
                    <td>
                        <!-- Action buttons -->
                        <a href="#" class="btn btn-warning btn-sm mr-4">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    
                        <button type="button" class="btn btn-danger btn-sm mr-4">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </td>
                    </td>
                </tr>
            @endforeach
            </tbody>
            
        </table>
    </div>
</div>
@endsection
