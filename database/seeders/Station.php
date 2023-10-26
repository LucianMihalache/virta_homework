<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Station extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stations')->insert([
            'company_id' => 1,
            'name' => 'Colloseum Mall 1',
            'latitude' => 44.492570,
            'longitude' => 26.014408,
            'address' => 'Șoseaua Chitilei nr. 284 București',
        ]);
        DB::table('stations')->insert([
            'company_id' => 1,
            'name' => 'Colloseum Mall 2',
            'latitude' => 44.492566,
            'longitude' => 26.014380,
            'address' => 'Șoseaua Chitilei nr. 284 București',
        ]);
        DB::table('stations')->insert([
            'company_id' => 1,
            'name' => 'Colloseum Mall 3',
            'latitude' => 44.492538,
            'longitude' => 26.014344,
            'address' => 'Șoseaua Chitilei nr. 284 București',
        ]);
        DB::table('stations')->insert([
            'company_id' => 2,
            'name' => 'Colloseum Mall 4',
            'latitude' => 44.492519,
            'longitude' => 26.014331,
            'address' => 'Șoseaua Chitilei nr. 284 București',
        ]);
        DB::table('stations')->insert([
            'company_id' => 2,
            'name' => 'Colloseum Mall 5',
            'latitude' => 44.492648,
            'longitude' => 26.014430,
            'address' => 'Șoseaua Chitilei nr. 284 București',
        ]);
        DB::table('stations')->insert([
            'company_id' => 3,
            'name' => 'Colloseum Mall 6',
            'latitude' => 44.492622,
            'longitude' => 26.014488,
            'address' => 'Șoseaua Chitilei nr. 284 București',
        ]);
        DB::table('stations')->insert([
            'company_id' => 1,
            'name' => 'Sun Plaza 1',
            'latitude' => 44.396664,
            'longitude' => 26.122396,
            'address' => 'Calea Văcărești 391 București',
        ]);
        DB::table('stations')->insert([
            'company_id' => 2,
            'name' => 'Sun Plaza 2',
            'latitude' => 44.396779,
            'longitude' => 26.122294,
            'address' => 'Calea Văcărești 391 București',
        ]);
        DB::table('stations')->insert([
            'company_id' => 3,
            'name' => 'Sun Plaza 3',
            'latitude' => 44.396924,
            'longitude' => 26.122283,
            'address' => 'Calea Văcărești 391 București',
        ]);
        DB::table('stations')->insert([
            'company_id' => 1,
            'name' => 'Highway A2 1',
            'latitude' => 44.428806,
            'longitude' => 26.896685,
            'address' => 'Autostrada Soarelui A2 km 66 dreapta A2 Lehliu-Gară',
        ]);
        DB::table('stations')->insert([
            'company_id' => 2,
            'name' => 'Highway A2 2',
            'latitude' => 44.428646,
            'longitude' => 26.896346,
            'address' => 'Autostrada Soarelui A2 km 66 dreapta A2 Lehliu-Gară',
        ]);
        DB::table('stations')->insert([
            'company_id' => 3,
            'name' => 'Highway A2 3',
            'latitude' => 44.428797,
            'longitude' => 26.896803,
            'address' => 'Autostrada Soarelui A2 km 66 dreapta A2 Lehliu-Gară',
        ]);
        DB::table('stations')->insert([
            'company_id' => 1,
            'name' => 'Highway A2 4',
            'latitude' => 44.429912,
            'longitude' => 26.894623,
            'address' => 'Autostrada Soarelui A2 km 66 stanga',
        ]);
        DB::table('stations')->insert([
            'company_id' => 1,
            'name' => 'Highway A2 5',
            'latitude' => 44.429969,
            'longitude' => 26.894731,
            'address' => 'Autostrada Soarelui A2 km 66 stanga',
        ]);
        DB::table('stations')->insert([
            'company_id' => 2,
            'name' => 'Highway A2 6',
            'latitude' => 44.429972,
            'longitude' => 26.894924,
            'address' => 'Autostrada Soarelui A2 km 66 stanga',
        ]);
        DB::table('stations')->insert([
            'company_id' => 1,
            'name' => 'Highway A2 7',
            'latitude' => 44.443338,
            'longitude' => 26.680431,
            'address' => 'Autostrada Soarelui A2 km 49',
        ]);
        DB::table('stations')->insert([
            'company_id' => 2,
            'name' => 'Highway A2 8',
            'latitude' => 44.442413,
            'longitude' => 26.680422,
            'address' => 'Autostrada Soarelui A2, km 49',
        ]);
        DB::table('stations')->insert([
            'company_id' => 1,
            'name' => 'Highway A2 9',
            'latitude' => 44.141100,
            'longitude' => 28.462014,
            'address' => 'TOALETE SI MESE PT PICNIC Valu lui Traian',
        ]);
        DB::table('stations')->insert([
            'company_id' => 2,
            'name' => 'Highway A2 10',
            'latitude' => 44.140139,
            'longitude' => 28.467789,
            'address' => 'TOALETE SI MESE PT PICNIC Valu lui Traian',
        ]);
    }
}
