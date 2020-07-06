<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comp1 = DB::table('companies')->insert([
        	'user_id' => 2, 
        	'name' => 'Maju Jaya', 
        	'kebun_id' => '1,2'
        ]);
    }
}
