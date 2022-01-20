<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luaranpkmmhs3;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class Luaranpkmmhs3Controller extends Controller
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
             $Luaranpkmmhs3 = DB::table('luaran_pkm_mhs3')
                ->where('prodi_id', '=', $id)
                ->get();

        $count_tahun = $Luaranpkmmhs3->count('tahun');
        }

        else {

        $Luaranpkmmhs3 = Luaranpkmmhs3::latest()->paginate(10);
        $count_tahun = $Luaranpkmmhs3->count('tahun');

        }
        return view('Luaranpkmmhs3.index',compact('Luaranpkmmhs3','count_tahun','id'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Luaranpkmmhs3.create');
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

        Luaranpkmmhs3::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmmhs3.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Luaranpkmmhs3 $Luaranpkmmhs3)
    {
        return view('Luaranpkmmhs3.show', compact('Luaranpkmmhs3'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Luaranpkmmhs3 $Luaranpkmmhs3)
    {
        return view ('Luaranpkmmhs3.edit', compact('Luaranpkmmhs3'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_pkm_mhs3)
    {
        $request -> validate([
    
         
            'luaran_pkm' => 'required',
            'tahun'=> 'required',
            'keterangan'


        ]);

        $Luaranpkmmhs3=Luaranpkmmhs3::find($id_pkm_mhs3)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmmhs3.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pkm_mhs3)
    {
        $Luaranpkmmhs3=Luaranpkmmhs3::find($id_pkm_mhs3)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Luaranpkmmhs3.index');
              
    }
}
