<?php

use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisi1 = DB::table('divisis')->insert([
        	'company_id' => 1,
        	'kebun_id' => 1,  
        	'name' => 'Divisi 1', 
        	'blok_id' => '1,2'
        ]);
        $divisi2 = DB::table('divisis')->insert([
            'company_id' => 1,
            'kebun_id' => 1,  
            'name' => 'Divisi 2', 
            'blok_id' => '1,2'
        ]);
        $divisi3 = DB::table('divisis')->insert([
            'company_id' => 1,
            'kebun_id' => 1,  
            'name' => 'Divisi 3', 
            'blok_id' => '1,2'
        ]);
        

    }
}
