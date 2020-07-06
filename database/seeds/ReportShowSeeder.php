<?php

use Illuminate\Database\Seeder;

class ReportShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rpt = DB::table('report_shows')->insert([
            'periode' => '2020-01',
        	'tahun_tanam' => 2000,
        	'company_id' => 1,
        	'kebun_id' => 1,
            'report_list_id' => 1,
        	'divisi_id' => 1,
        	'realisasi_luastm' => 1000000,
        	'anggaran_luastm' => 2000000,
        	'realisasi_bi_produksi' => 1000000,
        	'anggaran_bi_produksi' => 2000000,
        	'realisasi_sdbi_produksi' => 1000000,
        	'anggaran_sdbi_produksi' => 2000000,
        	'anggaran_th_produksi' => 3000000,
        	'kgha_bi' => 1000,
        	'kgha_sdbi' => 2000,
        	'anggaran_th_kgha' => 10000
        ]);
    }
}
