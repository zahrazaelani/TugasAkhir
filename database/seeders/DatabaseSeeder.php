<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    ///digunakan untuk memanggil class dari seed tsb ke databaseeder
    public function run()
    {
        $this->call([
            IndoRegionSeeder::class,
            IndoRegionProvinceSeeder::class,
            IndoRegionRegencySeeder::class,
            CouriersTableSeeder::class,
            JabatanSeeder::class,
            ProdiSeeder::class
        ]);
    }
}
