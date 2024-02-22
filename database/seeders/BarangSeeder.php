<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::truncate();

        // Data dummy untuk diisi ke dalam tabel barang
        $data = [
            [
                'merk' => 'MSI',
                'seri' => 'Modern14',
                'spesifikasi' => 'bagus',
                'stok' => 10,
                'kategori_id' => 3,
            ],
            [
                'merk' => 'LENOVO',
                'seri' => 'Thinkpad',
                'spesifikasi' => 'second',
                'stok' => 15,
                'kategori_id' => 3,
            ],
            // ... tambahkan data lain sesuai kebutuhan Anda
        ];

        // Masukkan data ke dalam tabel barang
        Barang::insert($data);
    }
}
