<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'status' => 'Full Time'
        ]);

        Jabatan::create([
            'status' => 'Part Time'
        ]);

        Jabatan::create([
            'status' => 'Freelance'
        ]);

        Jabatan::create([
            'status' => 'Contract'
        ]);

        Jabatan::create([
            'status' => 'Internship'
        ]);
    }
}
