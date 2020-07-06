<?php

use Illuminate\Database\Seeder;

class KebunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kebun1 = DB::table('kebuns')->insert([
        	'company_id' => 1, 
        	'name' => 'Kebun Maju Jaya', 
        	'divisi_id' => '1,2'
        ]);
        $kebun2 = DB::table('kebuns')->insert([
            'company_id' => 1, 
            'name' => 'Kebun Maju Jaya 2', 
            'divisi_id' => '1,2'
        ]);
        $kebun3 = DB::table('kebuns')->insert([
            'company_id' => 1, 
            'name' => 'Kebun Maju Jaya 3', 
            'divisi_id' => '1,2'
        ]);

        
    }
}
