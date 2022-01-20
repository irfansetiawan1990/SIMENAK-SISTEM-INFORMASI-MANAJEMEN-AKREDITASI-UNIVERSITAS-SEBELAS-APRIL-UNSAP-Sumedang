<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luaranpkmmhs4;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class Luaranpkmmhs4Controller extends Controller
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
             $Luaranpkmmhs4 = DB::table('luaran_pkm_mhs4')
                ->where('prodi_id', '=', $id)
                ->get();

        $count_tahun = $Luaranpkmmhs4->count('tahun');
        }

        else {

        $Luaranpkmmhs4 = Luaranpkmmhs4::latest()->paginate(10);
        $count_tahun = $Luaranpkmmhs4->count('tahun');

        }
        return view('Luaranpkmmhs4.index',compact('Luaranpkmmhs4','count_tahun','id'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Luaranpkmmhs4.create');
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

        Luaranpkmmhs4::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmmhs4.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Luaranpkmmhs4 $Luaranpkmmhs4)
    {
        return view('Luaranpkmmhs4.show', compact('Luaranpkmmhs4'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Luaranpkmmhs4 $Luaranpkmmhs4)
    {
        return view ('Luaranpkmmhs4.edit', compact('Luaranpkmmhs4'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pkm_mhs4)
    {
        $request -> validate([
    
         
            'luaran_pkm' => 'required',
            'tahun'=> 'required',
            'keterangan'


        ]);

        $Luaranpkmmhs4=Luaranpkmmhs4::find($id_pkm_mhs4)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmmhs4.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pkm_mhs4)
    {
        $Luaranpkmmhs4=Luaranpkmmhs4::find($id_pkm_mhs4)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Luaranpkmmhs4.index');
              
    }
}
