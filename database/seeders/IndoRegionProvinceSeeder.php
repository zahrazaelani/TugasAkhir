<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use AzisHapidin\IndoRegion\RawDataGetter;
use Illuminate\Support\Facades\DB;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class IndoRegionProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @deprecated
     *
     * @return void
     */
    public function run()
    {
        // Get Data untuk mendapatkan seluruh data dari data provinsi raja ongkir 
        $provinces = RajaOngkir::provinsi()->all();

        // diproses dalam perulangan untuk proses Insert Data to tabel provinsi
        foreach($provinces as $province){
            Province::create([
                'id' => $province['province_id'], //id = id pada tabel provinsi
                'name' => $province['province']
            ]);
        }
    }
}
