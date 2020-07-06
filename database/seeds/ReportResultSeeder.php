<?php

use Illuminate\Database\Seeder;

class ReportResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dr = DB::table('report_list_report_show')->insert([
        	'report_list_id' => 1,
        	'report_show_id' => 1
        ]);
    }
}
