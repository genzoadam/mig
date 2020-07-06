<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Divisi;
use App\Kebun;
use App\Blok;

class DivisiController extends Controller
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
            $divisi = Divisi::orderBy('id', 'desc')->paginate(15);
            return view('divisi.index', compact('divisi'));
        }
        //khusus company
        elseif ($user->hasRole('company')) {
            $divisi = Divisi::where('company_id', $user->company_id)->paginate(15);
            return view('divisi.index', compact('divisi','user'));
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

        $kebun = Kebun::where('company_id', $companyId)->get();

        return view('divisi.create',compact('companyId', 'kebun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dvs = Divisi::insert([
            'company_id' => $request->company_id,
            'kebun_id' => $request->kebun_id,
            'name' => $request->name
        ]);

        return redirect('/divisi');
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
        $divisi = Divisi::find($id);

        $companyId = Auth::user()->company_id;

        $kebun = Kebun::where('company_id', $companyId)->get();

        return view('divisi.edit', compact('divisi', 'kebun'));

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
        $divisi = Divisi::find($id);
        $divisi->kebun_id = $request->kebun_id;
        $divisi->name = $request->name;
        $divisi->save();

        return redirect('/divisi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus divisi
        $divisi = Divisi::find($id);
        //hapus juga bloknya
        $blok = Blok::where('divisi_id', $divisi->id);

        //eks
        $divisi->delete();
        $blok->delete();

        return back();
    }
}
