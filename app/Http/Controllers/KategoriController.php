<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
// use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index()
    {
        $rsetKategori = Kategori::select('id','kategori','jenis',
        \DB::raw('(CASE
            WHEN kategori = "M" THEN "Modal"
            WHEN kategori = "A" THEN "Alat"
            WHEN kategori = "BHP" THEN "Bahan Habis Pakai"
            ELSE "Bahan Tidak Habis Pakai"
            END) AS ketKategori'))
        ->paginate(100);

        return view('vkategori.index', compact('rsetKategori'));
    }

    public function create()
    {
        return view('vkategori.create');
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'kategori' => 'required|string|max:100',
            'jenis' => 'required|in:M,A,BHP,BTHP',
        ]);

        // Simpan data kategori
        Kategori::create([
            'kategori' => $request->kategori,
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('vkategori.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('vkategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'kategori' => 'required|string|max:100',
            'jenis' => 'required|in:M,A,BHP,BTHP',
        ]);

        // Update data kategori
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'kategori' => $request->kategori,
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus data kategori
        // $kategori = Kategori::findOrFail($id);
        // $kategori->delete();

        // return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
        if (DB::table('barang')->where('kategori_id', $id)->exists()){
            return redirect()->route('kategori.index')->with(['Gagal' => 'Data Gagal Dihapus!']);
        } else {
            $rsetKategori = Kategori::find($id);
            $rsetKategori->delete();
            return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
    }
}
