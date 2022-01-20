<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luaranpkmmhs2;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class Luaranpkmmhs2Controller extends Controller
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
             $Luaranpkmmhs2 = DB::table('luaran_pkm_mhs2')
                ->where('prodi_id', '=', $id)
                ->get();

        $count_tahun = $Luaranpkmmhs2->count('tahun');
        }

        else {

        $Luaranpkmmhs2 = Luaranpkmmhs2::latest()->paginate(10);
        $count_tahun = $Luaranpkmmhs2->count('tahun');

        }
        return view('Luaranpkmmhs2.index',compact('Luaranpkmmhs2','count_tahun','id'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Luaranpkmmhs2.create');
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

        Luaranpkmmhs2::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmmhs2.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Luaranpkmmhs2 $Luaranpkmmhs2)
    {
        return view('Luaranpkmmhs2.show', compact('Luaranpkmmhs2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Luaranpkmmhs2 $Luaranpkmmhs2)
    {
        return view ('Luaranpkmmhs2.edit', compact('Luaranpkmmhs2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_pkm_mhs2)
    {
        $request -> validate([
    
         
            'luaran_pkm' => 'required',
            'tahun'=> 'required',
            'keterangan'


        ]);

        $Luaranpkmmhs2=Luaranpkmmhs2::find($id_pkm_mhs2)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmmhs2.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pkm_mhs2)
    {
        $Luaranpkmmhs2=Luaranpkmmhs2::find($id_pkm_mhs2)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Luaranpkmmhs2.index');
              
    }
}
