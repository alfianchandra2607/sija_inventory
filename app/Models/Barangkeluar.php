<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    use HasFactory;
    protected $table="barangkeluar";
    protected $fillable = ['tgl_keluar', 'qty_keluar', 'barang_id'];

    // Relasi ke model Kategori
    public function Barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
