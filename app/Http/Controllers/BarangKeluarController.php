<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Barangkeluar;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangkeluar = BarangKeluar::all();
        return view('vbarangkeluar.index', compact('barangkeluar'));
    }

    public function create()
    {
        $barangList = Barang::all();
        return view('vbarangkeluar.create', compact('barangList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl_keluar' => 'required|date',
            'qty_keluar' => 'required|integer',
            'barang_id' => 'required|exists:barang,id',
        ]);

        BarangKeluar::create([
            'tgl_keluar' => $request->tgl_keluar,
            'qty_keluar' => $request->qty_keluar,
            'barang_id' => $request->barang_id,
        ]);

        return redirect()->route('barangkeluar.index')->with('success', 'Data barang keluar berhasil ditambahkan');
    }

    public function show($id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        return view('vbarangkeluar.show', compact('barangkeluar'));
    }

    public function edit($id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        $barangList = Barang::all();
        return view('vbarangkeluar.edit', compact('barangkeluar', 'barangList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_keluar' => 'required|date',
            'qty_keluar' => 'required|integer',
        ]);

        $barangkeluar = BarangKeluar::findOrFail($id);
        $barangkeluar->update([
            'tgl_keluar' => $request->tgl_keluar,
            'qty_keluar' => $request->qty_keluar,
        ]);

        return redirect()->route('barangkeluar.index')->with('success', 'Data barang keluar berhasil diperbarui');
    }

    public function destroy($id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        $barangkeluar->delete();

        return redirect()->route('barangkeluar.index')->with('success', 'Data barang keluar berhasil dihapus');
    }
}
