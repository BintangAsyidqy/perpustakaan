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
                        <a href="{{ route('kunjungan.edit', $kunjungan->id) }}" class="btn btn-warning btn-sm mr-4">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <button type="button" 
        class="btn btn-danger btn-sm mr-4" 
        onclick="showModalDelete({{ $kunjungan->id }}, '{{ $kunjungan->nama_pengunjung }}')">
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
<!-- Modal Hapus Kunjungan -->
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
        $('#name_user').text(nama);
        
        // Atur action pada form modal dengan URL yang benar
        let url = "{{ route('kunjungan.delete', ':id') }}"; // Pastikan ini sesuai dengan rute penghapusan Anda
        url = url.replace(':id', id);
        
        // Mengatur action pada form modal
        $('#modalDeleteForm').attr('action', url);

        // Tampilkan modal
        $('#exampleModal').modal('show');
    }
</script>


