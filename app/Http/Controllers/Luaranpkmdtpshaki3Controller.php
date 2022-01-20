<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luaranpkmdtpshaki3;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class Luaranpkmdtpshaki3Controller extends Controller
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
             $Luaranpkmdtpshaki3 = DB::table('luaran_pkm_dtps_hki3')
                ->where('prodi_id', '=', $id)
                ->get();

        $count_tahun = $Luaranpkmdtpshaki3->count('tahun');
        }

        else {

        $Luaranpkmdtpshaki3 = Luaranpkmdtpshaki3::latest()->paginate(10);
        $count_tahun = $Luaranpkmdtpshaki3->count('tahun');

        }
        return view('Luaranpkmdtpshaki3.index',compact('Luaranpkmdtpshaki3','count_tahun','id'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Luaranpkmdtpshaki3.create');
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

        Luaranpkmdtpshaki3::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmdtpshaki3.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Luaranpkmdtpshaki3 $Luaranpkmdtpshaki3)
    {
        return view('Luaranpkmdtpshaki3.show', compact('Luaranpkmdtpshaki3'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Luaranpkmdtpshaki3 $Luaranpkmdtpshaki3)
    {
        return view ('Luaranpkmdtpshaki3.edit', compact('Luaranpkmdtpshaki3'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_pkm_dtps_haki3)
    {
        $request -> validate([
    
         
            'luaran_pkm' => 'required',
            'tahun'=> 'required',
            'keterangan'


        ]);

        $Luaranpkmdtpshaki3=Luaranpkmdtpshaki3::find($id_pkm_dtps_haki3)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmdtpshaki3.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pkm_dtps_haki3)
    {
        $Luaranpkmdtpshaki3=Luaranpkmdtpshaki3::find($id_pkm_dtps_haki3)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Luaranpkmdtpshaki3.index');
              
    }
}
