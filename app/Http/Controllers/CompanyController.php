<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;
use App\Kebun;
use App\Divisi;
use App\Blok;
use App\User;

class CompanyController extends Controller
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

            $company = Company::all();

            return view('company.index', compact('company'));
        }
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
        //ge user except admin
        $user = User::where([
            ['company_id','=', 0],
            ['id', '!=', 1],
            ['id', '!=', 2]
        ])->get();

        return view('company.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //insert company
        $com = Company::insert([
            'user_id' => $request->user_id,
            'name'    => $request->name,
        ]);

        //ubah compaany_id user
        $maxId = Company::max('id');
        $user = User::find($request->user_id);
        //ganti role user ke comp
        $user->attachRole('company');
        //hapus role lama
        $user->detachRole('user');
        $user->company_id = $maxId;
        $user->save();

        return redirect('/company');
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
        $company = Company::find($id);
        return view('company.edit', compact('company'));
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
        $company = Company::find($id);
        $company->name = $request->name;
        $company->save();
        return redirect('/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //ha[us ] comp
        $company = Company::find($id);

        //ganti role com ke user
        $user = User::find($company->user_id);
        $user->attachRole('user');
        //hapus role lama
        $user->detachRole('company');
        //balikin company id
        $user->company_id = 0;
        $user->save();

        //hapus kebun yg dimiliki compani ini
        $kebun = Kebun::where('company_id', $company->id);
        //hapus divisi yg dimiliki compani ini
        $divisi = Divisi::where('company_id', $company->id);
        //hapus blok yg dimiliki compani ini
        $blok = Blok::where('company_id', $company->id);

        //excecute
        $company->delete();
        $kebun->delete();
        $divisi->delete();
        $blok->delete();

        return back();
    }
}
