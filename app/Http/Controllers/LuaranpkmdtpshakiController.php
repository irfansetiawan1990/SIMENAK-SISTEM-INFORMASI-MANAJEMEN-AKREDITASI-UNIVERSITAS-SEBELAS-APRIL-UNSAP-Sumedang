<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luaranpkmdtpshaki;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class LuaranpkmdtpshakiController extends Controller
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

        $Prodi = Prodi::all();

        $id = Auth::user()->prodi_id;

        if (auth()->user()->level=="user"){
             $Luaranpkmdtpshaki = DB::table('luaran_pkm_dtps_hki')
                ->where('prodi_id', '=', $id)
                ->get();

        $count_tahun = $Luaranpkmdtpshaki->count('tahun');
        }

        else {

        $Luaranpkmdtpshaki = Luaranpkmdtpshaki::latest()->paginate(10);
        $count_tahun = $Luaranpkmdtpshaki->count('tahun');

        }
        return view('Luaranpkmdtpshaki.index',compact('Luaranpkmdtpshaki','count_tahun','id'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Luaranpkmdtpshaki.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        
            'luaran_pkm' => 'required',
            'tahun'=> 'required',
            'keterangan',
            'prodi_id' => 'required'

        ]);

        Luaranpkmdtpshaki::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmdtpshaki.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Luaranpkmdtpshaki $Luaranpkmdtpshaki)
    {
        return view('Luaranpkmdtpshaki.show', compact('Luaranpkmdtpshaki'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Luaranpkmdtpshaki $Luaranpkmdtpshaki)
    {
        return view ('Luaranpkmdtpshaki.edit', compact('Luaranpkmdtpshaki'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_pkm_dtps_haki)
    {
        $request -> validate([
    
         
            'luaran_pkm' => 'required',
            'tahun'=> 'required',
            'keterangan'


        ]);

        $Luaranpkmdtpshaki=Luaranpkmdtpshaki::find($id_pkm_dtps_haki)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmdtpshaki.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pkm_dtps_haki)
    {
        $Luaranpkmdtpshaki=Luaranpkmdtpshaki::find($id_pkm_dtps_haki)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Luaranpkmdtpshaki.index');
              
    }
}
