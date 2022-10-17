<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['code'=>'jne','title'=>'JNE'],
            ['code'=>'pos','title'=>'POS'],
            ['code'=>'tiki','title'=>'TIKI'],
        ];
    }
}
