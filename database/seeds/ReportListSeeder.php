<?php

use Illuminate\Database\Seeder;

class ReportListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dr = DB::table('report_lists')->insert([
        	'company_id' => 1,
        	'kebun_id' => 1,  
        	'periode' => '2020-01'
        ]);
    }
}
