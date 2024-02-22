<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;

class BarangController extends Controller
{
    public function index()
    {
        $rsetBarang = Barang::all();
        return view('vbarang.index', compact('rsetBarang'));
    }

    public function create()
    {
        $rsetKategori = Kategori::all();
        return view('vbarang.create', compact('rsetKategori'));
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'merk' => 'required|string|max:50',
            'seri' => 'required|string|max:50',
            'spesifikasi' => 'nullable|string',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        // Simpan data barang
        Barang::create([
            'merk' => $request->merk,
            'seri' => $request->seri,
            'spesifikasi' => $request->spesifikasi,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('vbarang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $rsetKategori = Kategori::all();
        return view('vbarang.edit', compact('barang', 'rsetKategori'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'merk' => 'required|string|max:50',
            'seri' => 'required|string|max:50',
            'spesifikasi' => 'nullable|string',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        // Update data barang
        $barang = Barang::findOrFail($id);
        $barang->update([
            'merk' => $request->merk,
            'seri' => $request->seri,
            'spesifikasi' => $request->spesifikasi,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus data barang
        // $barang = Barang::findOrFail($id);
        // $barang->delete();

        // return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
        $barangMasukTerkait = Barangmasuk::where('barang_id', $id)->exists();

        // Cek apakah ada transaksi barang keluar terkait dengan barang
        $barangKeluarTerkait = Barangkeluar::where('barang_id', $id)->exists();
    
        // Cek apakah stok barang tidak nol
        $stokBarang = Barang::where('id', $id)->where('stok', '>', 0)->exists();
    
        if ($barangMasukTerkait || $barangKeluarTerkait || $stokBarang) {
            return redirect()->route('barang.index')->with(['error' => 'Barang tidak dapat dihapus karena terkait dengan transaksi atau masih memiliki stok.']);
        } else {
            // Hapus barang jika tidak terkait dengan transaksi dan stoknya nol
            $barang = Barang::find($id);
            $barang->delete();
    
            return redirect()->route('barang.index')->with(['success' => 'Barang berhasil dihapus.']);
        }
        


    }
}
