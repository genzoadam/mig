<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Kebun;
use App\Divisi;
use App\Blok;
use App\Company;

class KebunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //khusus admin
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            $kebun = Kebun::orderBy('id', 'desc')->paginate(15);
            return view('kebun.index', compact('kebun'));
        }
        //khusus company
        elseif ($user->hasRole('company')) {
            $kebun = Kebun::where('company_id', $user->company_id)->paginate(15);
            return view('kebun.index', compact('kebun','user'));
        }
        //lainnya/user biasa
        else{
            return back();
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companyId = Auth::user()->company_id;

        return view('kebun.create',compact('companyId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kbn = Kebun::insert([
            'company_id' => $request->company_id,
            'name' => $request->name
        ]);

        // //tambah kebun ke pemilikan company
        // $companyId = Auth::user()->company_id;
        // $company = Company::where('id', $companyId);
        // $company->kebun_id = 

        return redirect('/kebun');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kebun = Kebun::find($id);

        return view('kebun.edit', compact('kebun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kebun = Kebun::find($id);
        $kebun->name = $request->name;
        $kebun->save();

        return redirect('/kebun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus lebun
        $kebun = Kebun::find($id);
        //hapus juga divisinya
        $divisi = Divisi::where('kebun_id', $kebun->id);
        //hapus juga blokmya
        $blok = Blok::where('divisi_id', $divisi->first()->id);

        //eksekusi
        $kebun->delete();
        $divisi->delete();
        $blok->delete();

        return back();
    }
}
