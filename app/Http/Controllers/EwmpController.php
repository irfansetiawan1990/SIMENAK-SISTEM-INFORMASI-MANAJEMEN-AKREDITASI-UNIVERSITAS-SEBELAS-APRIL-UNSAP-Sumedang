<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ewmp;
use App\Models\Prodi;
use App\Models\Dosentetappt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class EwmpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.

     */
    public function index()
    {
        $prodi = Prodi::all();

        $id = Auth::user()->prodi_id;

        $Dosentetappt =  DB::table('dosen_tetap_pt')
                        ->select('id','nama_dosen')
                        ->get();

        if (auth()->user()->level=="user")
        $ewmp = DB::table('ewmp_dosen')
                ->where('prodi_id', '=', $id)
                ->get();
        else


       $ewmp = Ewmp::simplepaginate(10);

        //Menampilkan
        return view('Ewmp.index',compact('ewmp','id','Dosentetappt'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
      \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dosen'=> 'required|unique:ewmp_dosen|max:100',
            'dtps' => 'required',
            'ps_akreditasi' => 'required',
            'ps_dalampt' => 'required',
            'ps_luarpt'=> 'required',
            'penelitian' => 'required',
            'pkm' => 'required',
            'tugas_tambahan' => 'required',
            'jml_sks' => 'required',
            'rata_rata_persemester' => 'required',
            'prodi_id' => 'required'
            
        ]);

        Ewmp::create($request->all());

        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Ewmp.index');
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
   
  
     */
    public function update(Request $request, $id_ewmp_dosen)
    {
        $request -> validate([
            'nama_dosen'=> 'required',
            'dtps' => 'required',
            'ps_akreditasi' => 'required',
            'ps_dalampt' => 'required',
            'ps_luarpt'=> 'required',
            'penelitian' => 'required',
            'pkm' => 'required',
            'tugas_tambahan' => 'required',
            'jml_sks' => 'required',
            'rata_rata_persemester' => 'required',


        ]);

        $ewmp = Ewmp::find($id_ewmp_dosen)->update($request->all());

        Alert::success('Sukses', 'Data Berhasil Dirubah');
        return redirect()->route('Ewmp.index');
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy($id_ewmp_dosen)
    {
        $ewmp = Ewmp::find($id_ewmp_dosen)->delete();

        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Ewmp.index');
    }
}
