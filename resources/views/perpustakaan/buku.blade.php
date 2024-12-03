@extends('layout.app')
@section('title', 'perpustakaan')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="{{ route('perpustakaan.data') }}" method="POST">
            @csrf
            <!-- Tambahkan elemen lain di sini jika diperlukan -->
        </form>
    </div>
    <div class="card-body">
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        <div class="d-flex justify-content-end">
            <a href="{{ route('orders.export.excel') }}" class="btn btn-primary">Eksport Excel</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Buku</th>
                        <th>Tipe Buku</th>
                        <th>Lama Peminjaman</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($buku as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['type'] }}</td>
                        <td>{{ $item['lama'] }} Hari</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('perpustakaan.edit', $item['id']) }}" class="btn btn-warning btn-sm mr-4">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('perpustakaan.downloadPDF', $item->id) }}" class="btn btn-danger btn-sm mr-4">
                                <i class="fas fa-file-pdf"></i> Download PDF
                            </a>
                            
                            <button type="button" class="btn btn-danger btn-sm" onclick="showModalDelete('{{ $item['id'] }}', '{{ $item['nama'] }}')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                        
                            
                            {{-- <!-- Tombol hapus -->
                            <button class="btn btn-danger btn-sm" >
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                             --}}
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
            <!-- Modal Hapus Pengguna -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="modalDeleteForm" class="modal-content" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data <b><span id="nama_user"></span>?</b>
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
                    // Isi nama buku di modal
                    $('#nama_user').text(nama);
                    
                    // Atur action pada form modal dengan URL yang benar
                    let url = "{{ route('perpustakaan.delete', ':id') }}";
                    url = url.replace(':id', id);
                    $('#modalDeleteForm').attr('action', url);
            
                    // Tampilkan modal
                    $('#exampleModal').modal('show');
                }
            </script>
            
