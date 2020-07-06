<?php

use Illuminate\Database\Seeder;

class BlokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blok1 = DB::table('bloks')->insert([
        	'company_id' => 1, 
        	'divisi_id'  => 1,
        	'name' => 'A', 
        	'jumlah_sawit' => '1000',
        	'tahun_tanam'  => '2019'
        ]);
        $blok2 = DB::table('bloks')->insert([
            'company_id' => 1, 
            'divisi_id'  => 1,
            'name' => 'B', 
            'jumlah_sawit' => '1000',
            'tahun_tanam'  => '2018'
        ]);
        $blok3 = DB::table('bloks')->insert([
            'company_id' => 1, 
            'divisi_id'  => 1,
            'name' => 'C', 
            'jumlah_sawit' => '1000',
            'tahun_tanam'  => '2011'
        ]);

        
    }
}
