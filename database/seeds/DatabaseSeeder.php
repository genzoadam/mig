<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(LaratrustSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(KebunSeeder::class);
        $this->call(DivisiSeeder::class);
        $this->call(BlokSeeder::class);
        $this->call(ReportListSeeder::class);
        $this->call(ReportShowSeeder::class);
        $this->call(ReportResultSeeder::class);
    }
}
