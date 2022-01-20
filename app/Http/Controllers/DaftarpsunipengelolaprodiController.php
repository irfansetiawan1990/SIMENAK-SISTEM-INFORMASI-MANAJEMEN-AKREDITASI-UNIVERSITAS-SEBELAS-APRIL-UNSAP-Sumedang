<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\Prodi;
use\App\Models\Daftarpsunipengelolaprodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;



class DaftarpsunipengelolaprodiController extends Controller
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


        $prodi = Prodi::all();
        $Daftarpsunipengelolaprodi = DB::table('tb_daftarpsunipengelolaprodi')
                    ->join('tb_prodi','tb_prodi.id','tb_daftarpsunipengelolaprodi.prodi_id')
                    ->select('tb_daftarpsunipengelolaprodi.*','tb_prodi.nama_prodi')
                    ->get();
        $jml_prodi = $Daftarpsunipengelolaprodi->count('nama_prodi');
        $jml_ts = $Daftarpsunipengelolaprodi->sum('jml_mhs_saat_ts');
 
        return view('Daftarpsunipengelolaprodi.index',compact('Daftarpsunipengelolaprodi','prodi','jml_prodi','jml_ts'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = Prodi::all();
        $id = Auth::user()->prodi_id;
        return view('Daftarpsunipengelolaprodi.create', compact('prodi','id'));
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
        'jenis_program' => 'required' ,
        'prodi_id' => 'required',
        'status'=> 'required',
        'no_tgl_sk'=> 'required',
        'tgl_kadaluarsa'=> 'required',
        'jml_mhs_saat_ts'=> 'required'

        ]);

        Daftarpsunipengelolaprodi::create($request->all());
        Alert::success('data berhasil disimpan');
        return redirect()->route('Daftarpsunipengelolaprodi.index');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_upps
     * @return \Illuminate\Http\Response
     */
    public function show($id_upps)
    {
        $Daftarpsunipengelolaprodi = Daftarpsunipengelolaprodi::find($id_upps);
        return view('Daftarpsunipengelolaprodi.show', compact('Daftarpsunipengelolaprodi'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id_upps)
    {
        $Daftarpsunipengelolaprodi = Daftarpsunipengelolaprodi::find($id_upps);
        return view ('Daftarpsunipengelolaprodi.edit', compact('Daftarpsunipengelolaprodi'));
    }

    /**
  
     */
    public function update(Request $request, $id_upps)
    {
        $request -> validate([
        'jenis_program' =>'required',
        'status'=>'required',
        'no_tgl_sk'=>'required',
        'tgl_kadaluarsa'=>'required',
        'jml_mhs_saat_ts'=>'required'
        ]);

       $Daftarpsunipengelolaprodi = Daftarpsunipengelolaprodi::find($id_upps)->update($request->all());

        Alert::success('data berhasil dirubah');
        return redirect()->route('Daftarpsunipengelolaprodi.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_upps
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_upps)
    {
        $Daftarpsunipengelolaprodi = Daftarpsunipengelolaprodi::find($id_upps)->delete();
        Alert::success('data berhasil dihapus');
        return redirect()->route('Daftarpsunipengelolaprodi.index');
        
    }
}