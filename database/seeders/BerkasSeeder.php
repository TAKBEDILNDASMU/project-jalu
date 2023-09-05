<?php

namespace Database\Seeders;

use App\Models\Berkas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BerkasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berkas::create([
            'path_berkas' => 'docs/Pemerintahan.pdf',
            'nama_berkas' => 'Susunan Pemerintahan'
        ]);
        Berkas::create([
            'path_berkas' => 'docs/Keuangan.pdf',
            'nama_berkas' => 'Keuangan'
        ]);
        Berkas::create([
            'path_berkas' => 'docs/Penduduk.pdf',
            'nama_berkas' => 'Berkas Penduduk'
        ]);
        Berkas::create([
            'path_berkas' => 'docs/Pertanahan.pdf',
            'nama_berkas' => 'Pertanahan'
        ]);
    }
}