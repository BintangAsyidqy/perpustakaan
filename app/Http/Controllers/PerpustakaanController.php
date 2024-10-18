<?php

namespace App\Http\Controllers;

use App\Models\perpustakaan;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function data()
    {
        //
        $buku = perpustakaan::all();
        return view('perpustakaan.buku', compact('buku'), [
            'perpustakaan' => perpustakaan::latest()->get()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('perpustakaan.insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'type' => 'required',
            'lama' => 'required|numeric',
        ], [
            'nama.required' => 'Nama buku harus diisi!',
            'type.required' => 'Tipe buku harus diisi!',
            'lama.required' => 'Lama peminjaman harus diisi!',
        ]);

        Perpustakaan::create([
            'nama' => $request->nama,
            'type' => $request->type,
            'lama' => $request->lama,
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambah Data Peminjaman Buku!');
        //
        // $buku = Buku::all();
        // return view('perpustakaan.data', compact('buku'));
    }

    /**
     * Display the specified resource.
     */
    public function show(perpustakaan $perpustakaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Perpustakaan::where('id', $id)->first();
        return view('perpustakaan.edit', compact('buku')); 
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'type' => 'required',
            'lama' => 'required',
        ]);

        Perpustakaan::where('id', $id)->update([
            'nama' => $request->nama,
            'type' => $request->type,
            'lama' => $request->lama,
        ]);

        return redirect()->route('perpustakaan.data')->with('success', 'Berhasil Mengedit Data Peminjaman Buku!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $proses = Perpustakaan::where('id', $id)->delete(); 

        if ($proses) {
            return redirect()->back()->with('success', 'Berhasil menghapus data obat!');
        }else{
            return redirect()->back()->with('failed', 'Gagal menghapus data obat!');
        }
    }

    
}
