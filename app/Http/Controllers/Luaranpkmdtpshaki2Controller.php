<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luaranpkmdtpshaki2;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class Luaranpkmdtpshaki2Controller extends Controller
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
             $Luaranpkmdtpshaki2 = DB::table('luaran_pkm_dtps_hki2')
                ->where('prodi_id', '=', $id)
                ->get();

        $count_tahun = $Luaranpkmdtpshaki2->count('tahun');
        }

        else {

        $Luaranpkmdtpshaki2 = Luaranpkmdtpshaki2::latest()->paginate(10);
        $count_tahun = $Luaranpkmdtpshaki2->count('tahun');

        }
        return view('Luaranpkmdtpshaki2.index',compact('Luaranpkmdtpshaki2','count_tahun','id'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Luaranpkmdtpshaki2.create');
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

        Luaranpkmdtpshaki2::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmdtpshaki2.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Luaranpkmdtpshaki2 $Luaranpkmdtpshaki2)
    {
        return view('Luaranpkmdtpshaki2.show', compact('Luaranpkmdtpshaki2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Luaranpkmdtpshaki2 $Luaranpkmdtpshaki2)
    {
        return view ('Luaranpkmdtpshaki2.edit', compact('Luaranpkmdtpshaki2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_pkm_dtps_haki2)
    {
        $request -> validate([
    
         
            'luaran_pkm' => 'required',
            'tahun'=> 'required',
            'keterangan'


        ]);

        $Luaranpkmdtpshaki2=Luaranpkmdtpshaki2::find($id_pkm_dtps_haki2)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmdtpshaki2.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pkm_dtps_haki2)
    {
        $Luaranpkmdtpshaki2=Luaranpkmdtpshaki2::find($id_pkm_dtps_haki2)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Luaranpkmdtpshaki2.index');
              
    }
}
