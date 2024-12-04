@extends('layout.app')

@section('title', 'Daftar Kunjungan')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Kunjungan Perpustakaan</h1>

    <!-- Flash Message -->
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <!-- Action Buttons -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('kunjungan.tambah') }}" class="btn btn-primary me-4">Tambah Kunjungan</a>
        <a href="{{ route('kunjungan.export.excel') }}" class="btn btn-primary me-4">Ekspor Excel</a>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengunjung</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Keperluan</th>
                    <th>Aksi</th>
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
                            <a href="{{ route('kunjungan.edit', $kunjungan->id) }}" class="btn btn-warning btn-sm me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('kunjungan.export.pdf', $kunjungan->id) }}" class="btn btn-danger btn-sm me-2">
                                <i class="fas fa-file-pdf"></i> Download PDF
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" 
                                onclick="showModalDelete({{ $kunjungan->id }}, '{{ $kunjungan->nama_pengunjung }}')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" id="modalDeleteForm">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data <b><span id="name_user"></span>?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
</div>
@endsection

<script>
    function showModalDelete(id, nama) {
        // Isi nama pengunjung di modal
        document.getElementById('name_user').textContent = nama;

        // Atur action pada form modal dengan URL yang benar
        const url = "{{ route('kunjungan.delete', ':id') }}".replace(':id', id);
        document.getElementById('modalDeleteForm').setAttribute('action', url);

        // Tampilkan modal
        const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
        modal.show();
    }
</script>
