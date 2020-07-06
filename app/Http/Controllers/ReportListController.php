<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ReportList;
use App\ReportShow;
use App\Company;
use App\Kebun;
use App\Divisi;
use App\Blok;

class ReportListController extends Controller
{
	//auth check
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	$reportList = ReportList::orderBy('id', 'desc')->get();

    	// return $reportList;
    	
    	return view('reportList.index', compact('reportList'));
    }

    public function create(){

        $company = Company::pluck('name','id');

        return view('reportList.create',compact('company'));
    }

    // get kebun berdasarkan komp
    public function getKebun(Request $request){
        $getKebun = Kebun::where('company_id', $request->get('id'))->pluck('name', 'id');

        return response()->json($getKebun);
    }
    

    public function store(Request $request)
    {
        $drpt = ReportList::insert([
            'periode' => $request->periode,
            'company_id' => $request->company_id,
            'kebun_id' => $request->kebun_id
        ]);
        $maxId = ReportList::max('id');
        $rpt = ReportShow::insert([
            'tahun_tanam' => 0,
            'report_list_id' => $maxId,
            'periode' => $request->periode,
            'company_id' => $request->company_id,
            'kebun_id' => $request->kebun_id
        ]);

        return redirect('/reportshow/create/' .$maxId);
    }

    public function destroy($id){

        $rptlist = ReportList::find($id);

        $rptshow = ReportShow::where('report_list_id', $rptlist->id);

        $rptlist->delete();
        $rptshow->delete();

        return back();
    }

}
