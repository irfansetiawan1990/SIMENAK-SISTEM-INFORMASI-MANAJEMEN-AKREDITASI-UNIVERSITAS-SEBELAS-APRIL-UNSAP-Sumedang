<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luaranpkmmhs;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class LuaranpkmmhsController extends Controller
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
             $Luaranpkmmhs = DB::table('luaran_pkm_mhs')
                ->where('prodi_id', '=', $id)
                ->get();

        $count_tahun = $Luaranpkmmhs->count('tahun');
        }

        else {

        $Luaranpkmmhs = Luaranpkmmhs::latest()->paginate(10);
        $count_tahun = $Luaranpkmmhs->count('tahun');

        }
        return view('Luaranpkmmhs.index',compact('Luaranpkmmhs','count_tahun','id'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Luaranpkmmhs.create');
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

        Luaranpkmmhs::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmmhs.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Luaranpkmmhs $Luaranpkmmhs)
    {
        return view('Luaranpkmmhs.show', compact('Luaranpkmmhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Luaranpkmmhs $Luaranpkmmhs)
    {
        return view ('Luaranpkmmhs.edit', compact('Luaranpkmmhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_pkm_mhs)
    {
        $request -> validate([
    
         
            'luaran_pkm' => 'required',
            'tahun'=> 'required',
            'keterangan'


        ]);

        $Luaranpkmmhs=Luaranpkmmhs::find($id_pkm_mhs)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Luaranpkmmhs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pkm_mhs)
    {
        $Luaranpkmmhs=Luaranpkmmhs::find($id_pkm_mhs)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Luaranpkmmhs.index');
              
    }
}
