<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luaranpkmdtpshaki4;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class Luaranpkmdtpshaki4Controller extends Controller
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
             $Luaranpkmdtpshaki4 = DB::table('luaran_pkm_dtps_hki4')
                ->where('prodi_id', '=', $id)
                ->get();

        $count_tahun = $Luaranpkmdtpshaki4->count('tahun');
        }

        else {

        $Luaranpkmdtpshaki4 = Luaranpkmdtpshaki4::latest()->paginate(10);
        $count_tahun = $Luaranpkmdtpshaki4->count('tahun');

        }
        return view('Luaranpkmdtpshaki4.index',compact('Luaranpkmdtpshaki4','count_tahun','id'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Luaranpkmdtpshaki4.create');
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

        Luaranpkmdtpshaki4::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmdtpshaki4.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Luaranpkmdtpshaki4 $Luaranpkmdtpshaki4)
    {
        return view('Luaranpkmdtpshaki4.show', compact('Luaranpkmdtpshaki4'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Luaranpkmdtpshaki4 $Luaranpkmdtpshaki4)
    {
        return view ('Luaranpkmdtpshaki4.edit', compact('Luaranpkmdtpshaki4'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pkm_dtps_haki4)
    {
        $request -> validate([
    
         
            'luaran_pkm' => 'required',
            'tahun'=> 'required',
            'keterangan'


        ]);

        $Luaranpkmdtpshaki4=Luaranpkmdtpshaki4::find($id_pkm_dtps_haki4)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmdtpshaki4.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pkm_dtps_haki4)
    {
        $Luaranpkmdtpshaki4=Luaranpkmdtpshaki4::find($id_pkm_dtps_haki4)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Luaranpkmdtpshaki4.index');
              
    }
}
