@extends('layout.app')
@section('title', 'perpustakaan')
@section('content')
    
    <h1 class="h3 mb-2 text-gray-800">Tambah Buku</h1>
    @if (Session::get('success'))
    <div class="alert alert-success">
    {{ Session::get('success')}}</div>
    @endif

    <div class="row">
        <div class="col-6">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Buku</h6>
              </div>
              <div class="card-body">
                  <form action="{{ route('perpustakaan.store') }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label>Nama Buku</label>
                          <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                          @error('nama')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="type" class="form-label">Jenis Buku</label>
                        <div class="col-sm-10 p-0">
                            <select class="form-select form-control @error('type') is-invalid @enderror" name="type" id="type">
                                <option selected disabled hidden>Pilih</option>
                                <option value="novel" {{ old('type') == 'novel' ? 'selected' : '' }}>Novel</option>
                                <option value="komik" {{ old('type') == 'komik' ? 'selected' : '' }}>Komik</option>
                            </select>
                            @error('type')
                            <span class="text-danger mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                      <div class="form-group">
                        <label>Lama Peminjaman</label>
                          <input type="number" name="lama" class="form-control" value="{{ old('lama') }}">
                          @error('lama')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                  </form>
              </div>
          </div>
            
        </div>
    </div>

@endsection
