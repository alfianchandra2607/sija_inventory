<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
    use HasFactory;
    protected $table="barangmasuk";
    protected $fillable = ['tgl_masuk', 'qty_masuk', 'barang_id'];

    // Relasi ke model Kategori
    public function Barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
