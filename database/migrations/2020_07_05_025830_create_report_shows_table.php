<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_shows', function (Blueprint $table) {
            $table->bigIncrements('id');           
            $table->string('periode');
            $table->string('tahun_tanam')->nullable();
            $table->integer('company_id')->unsigned();
            $table->integer('kebun_id')->unsigned();
            $table->integer('report_list_id')->unsigned(); 
            $table->integer('divisi_id')->unsigned()->nullable();
            $table->string('realisasi_luastm')->nullable();
            $table->string('anggaran_luastm')->nullable();
            $table->string('realisasi_bi_produksi')->nullable();
            $table->string('anggaran_bi_produksi')->nullable();
            $table->string('realisasi_sdbi_produksi')->nullable();
            $table->string('anggaran_sdbi_produksi')->nullable();
            $table->string('anggaran_th_produksi')->nullable();
            $table->string('kgha_bi')->nullable();
            $table->string('kgha_sdbi')->nullable();
            $table->string('anggaran_th_kgha')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_shows');
    }
}
