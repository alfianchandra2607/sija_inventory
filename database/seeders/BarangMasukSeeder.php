<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barangmasuk;

class BarangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barangmasuk::truncate();

        // Data dummy untuk diisi ke dalam tabel barang
        $data = [
            [
                'tgl_masuk' => '2023-12-07',
                'qty_masuk' => 2,
                'barang_id' => 2,
            ]

            // ... tambahkan data lain sesuai kebutuhan Anda
        ];

        // Masukkan data ke dalam tabel barang
        Barangmasuk::insert($data);
    }
}
