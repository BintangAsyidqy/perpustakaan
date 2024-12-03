<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    // Menampilkan daftar kunjungan
    public function index()
    {
        $kunjungans = Kunjungan::all();
        return view('kunjungan.index', compact('kunjungans'));
    }

    // Menampilkan form tambah kunjungan
    public function create()
    {
        return view('kunjungan.create');
    }

    // Menyimpan data kunjungan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengunjung' => 'required',
            'tanggal_kunjungan' => 'required|date',
            'type' => 'required',  // Validasi untuk keperluan
        ]);
    
        Kunjungan::create([
            'nama_pengunjung' => $request->nama_pengunjung,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'keperluan' => $request->type,  // Simpan keperluan ke database
        ]);
    
        return redirect()->route('kunjungan.index')->with('success', 'Kunjungan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama_pengunjung' => 'required',
        'tanggal_kunjungan' => 'required|date',
        'keperluan' => 'required',
    ]);

    $kunjungan = Kunjungan::findOrFail($id);
    $kunjungan->update([
        'nama_pengunjung' => $request->nama_pengunjung,
        'tanggal_kunjungan' => $request->tanggal_kunjungan,
        'keperluan' => $request->keperluan,
    ]);

    return redirect()->route('kunjungan.index')->with('success', 'Kunjungan berhasil diperbarui.');
}

    public function edit($id)
{
    $kunjungan = Kunjungan::findOrFail($id); // Mencari kunjungan berdasarkan ID
    return view('kunjungan.edit', compact('kunjungan')); // Mengembalikan view edit dengan data kunjungan
}
    
    public function destroy($id)
{
    $kunjungan = Kunjungan::findOrFail($id); // Mencari kunjungan berdasarkan ID
    $kunjungan->delete(); // Menghapus data

    return redirect()->route('kunjungan.index')->with('success', 'Kunjungan berhasil dihapus.');
}

}
