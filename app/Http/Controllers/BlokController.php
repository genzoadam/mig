<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Blok;
use App\Divisi;

class BlokController extends Controller
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
            $blok = Blok::orderBy('id', 'desc')->paginate(15);
            return view('blok.index', compact('blok'));
        }
        //khusus company
        elseif ($user->hasRole('company')) {
            $blok = Blok::where('company_id', $user->company_id)->paginate(15);
            return view('blok.index', compact('blok','user'));
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

        $divisi = Divisi::where('company_id', $companyId)->get();

        return view('blok.create',compact('companyId', 'divisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blk = Blok::insert([
            'company_id' => $request->company_id,
            'divisi_id' => $request->divisi_id,
            'name' => $request->name,
            'jumlah_sawit' => $request->jumlah_sawit,
            'tahun_tanam' => $request->tahun_tanam
        ]);

        return redirect('/blok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //ambil data blok
        $blok = Blok::find($id);
        //company yg sdg login
        $companyId = Auth::user()->company_id;
        //data divisi
        $divisi = Divisi::where('company_id', $companyId)->get();

        return view('blok.edit', compact('blok', 'divisi'));
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
        $blok = Blok::find($id);
        $blok->divisi_id = $request->divisi_id;
        $blok->name = $request->name;
        $blok->jumlah_sawit = $request->jumlah_sawit;
        $blok->tahun_tanam = $request->tahun_tanam;
        $blok->save();

        return redirect('/blok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blok = Blok::find($id)->delete();

        return back();
    }
}
