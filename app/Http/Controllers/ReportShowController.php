<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportList;
use App\ReportShow;
use App\Divisi;
use App\Blok;

class ReportShowController extends Controller
{
    //auth check
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){

    	$report = ReportShow::where('report_list_id', $id);

    	$reportShow = $report->orderBy('tahun_tanam', 'asc')->get();

    	$ket = $report->first();
    	
    	return view('reportShow.index', compact('reportShow', 'ket'));
    }

    public function create($id){

        $report = ReportShow::where('report_list_id', $id)->first();

        $divisi = Divisi::where('kebun_id', $report->kebun_id)->pluck('name','id');
        
        return view('reportShow.create', compact('report', 'divisi'));
    }

    // get blok berdasarkan komp
    public function getBlok(Request $request){
        $getBlok = Blok::where('divisi_id', $request->get('id'))->pluck('name', 'id');

        return response()->json($getBlok);
    }

    public function store(Request $request)
    {
        $blok = Blok::find($request->blok_id);

        $maxId = ReportList::max('id');

        $rpt = ReportShow::insert([
            'periode' => $request->periode,
            'tahun_tanam' => $blok->tahun_tanam,
            'company_id' => $request->company_id,
            'kebun_id' => $request->kebun_id,
            'report_list_id' => $request->report_list_id,
            'divisi_id' => $request->divisi_id,
            'realisasi_luastm' => $request->realisasi_luastm,
            'anggaran_luastm' => $request->anggaran_luastm,
            'realisasi_bi_produksi' => $request->realisasi_bi_produksi,
            'anggaran_bi_produksi' => $request->anggaran_bi_produksi,
            'realisasi_sdbi_produksi' => $request->realisasi_sdbi_produksi,
            'anggaran_sdbi_produksi' => $request->anggaran_sdbi_produksi,
            'anggaran_th_produksi' => $request->anggaran_th_produksi,
            'kgha_bi' => $request->kgha_bi,
            'kgha_sdbi' => $request->kgha_sdbi,
            'anggaran_th_kgha' => $request->anggaran_th_kgha
        ]);

        $hps = ReportShow::where('tahun_tanam', 0)->delete();

        return redirect('/reportshow/'. $maxId);
    }
}
