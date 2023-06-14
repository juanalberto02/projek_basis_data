<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CPMK;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // CPMK
        CPMK::create([
                'MataKuliah' => 'Algoritma Pemograman',
                'S1' => 0,
                'S2' => 1,
                'K1' => 0,
                'K2' => 1,
                'Prodi' => 'TSD',
        ]);
        CPMK::create([
                'MataKuliah' => 'Statistika Matematika',
                'S1' => 1,
                'S2' => 1,
                'K1' => 0,
                'K2' => 0,
                'Prodi' => 'TSD',
        ]);
        CPMK::create([
                'MataKuliah' => 'Fisika II',
                'S1' => 1,
                'S2' => 0,
                'K1' => 1,
                'K2' => 1,
                'Prodi' => 'TE',
        ]);
        CPMK::create([
                'MataKuliah' => 'Kecerdasan Buatan',
                'S1' => 1,
                'S2' => 0,
                'K1' => 1,
                'K2' => 0,
                'Prodi' => 'TE',
        ]);
        CPMK::create([
                'MataKuliah' => 'Kecerdasan Buatan',
                'S1' => 0,
                'S2' => 1,
                'K1' => 1,
                'K2' => 1,
                'Prodi' => 'TRKB',
        ]);
    }
}
