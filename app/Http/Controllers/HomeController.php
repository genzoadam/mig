<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Company;
use App\Kebun;
use App\Divisi;
use App\Blok;
use App\ReportList;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //khusus admin
        $user = Auth::user();

        if ($user->hasRole('admin')) {

            //comp
            $company = Company::orderBy('id', 'desc')->paginate(15);
            //kebun
            $kebun = Kebun::orderBy('id', 'desc')->paginate(15);
            //divisi
            $divisi = Divisi::orderBy('id', 'desc')->paginate(15);
            //blok
            $blok = Blok::orderBy('id', 'desc')->paginate(15);
            //blok
            $report = ReportList::orderBy('id', 'desc')->paginate(15);


            return view('home', compact('company', 'kebun', 'divisi', 'blok','report'));
        }
        //khusus company
        elseif ($user->hasRole('company')) {
            //comp name
            $company = Company::where('user_id', $user->id)->first();

            //kebun
            $kebun = Kebun::where('company_id', $user->company_id)->paginate(15);
            //divisi
            $divisi = Divisi::where('company_id', $user->company_id)->paginate(15);
            //blok
            $blok = Blok::where('company_id', $user->company_id)->paginate(15);


            return view('home', compact('company', 'kebun', 'divisi', 'blok'));
        }
        //lainnya/user biasa
        else{
            return redirect('/reportlist');
        }
    }
}
