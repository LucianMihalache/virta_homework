<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Company extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            'parent_company_id' => 0,
            'name' => 'root',
        ]);
        DB::table('companies')->insert([
            'parent_company_id' => 1,
            'name' => 'virta_main',
        ]);
        DB::table('companies')->insert([
            'parent_company_id' => 2,
            'name' => 'virta_secondary',
        ]);
        DB::table('companies')->insert([
            'parent_company_id' => 3,
            'name' => 'virta_tertiary',
        ]);
    }
}
