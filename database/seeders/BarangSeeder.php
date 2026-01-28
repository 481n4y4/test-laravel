<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
            'nama_barang'=>'laskar pelangi',
            'deskripsi'=>'Buku laskar pelangi',
            'stok'=>20,
            'harga'=>20,
            'created_at'=>now()
        ]);
    }
}
