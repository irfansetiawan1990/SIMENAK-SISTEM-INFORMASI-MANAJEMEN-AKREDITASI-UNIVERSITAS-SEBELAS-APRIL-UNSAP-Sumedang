<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\Prodi;
use\App\Models\Fakultas;
use\App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Alert;



class PenggunaController extends Controller
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


        $id_fakultas = Auth::user()->fakultas_id
        $Pengguna = DB::table('users')
                ->join('tb_fakultas','users.fakultas_id','tb_fakultas.id_fakultas')
                ->join('tb_prodi','users.prodi_id','tb_prodi.id')
                ->select('users.*','tb_fakultas.nama_fak','tb_prodi.nama_prodi')
                ->where('tb_fakultas.id_fakultas')
                ->get();
                
 
        return view('Pengguna.index',compact('Pengguna','id_fakultas'))->with('i', (request()->input('page', 1) - 1) * 10);
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
        return view('Pengguna.create', compact('prodi','id'));
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

        Pengguna::create($request->all());
        Alert::success('data berhasil disimpan');
        return redirect()->route('Pengguna.index');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_upps
     * @return \Illuminate\Http\Response
     */
    public function show($id_upps)
    {
        $Pengguna = Pengguna::find($id_upps);
        return view('Pengguna.show', compact('Pengguna'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id_upps)
    {
        $Pengguna = Pengguna::find($id_upps);
        return view ('Pengguna.edit', compact('Pengguna'));
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

       $Pengguna = Pengguna::find($id_upps)->update($request->all());

        Alert::success('data berhasil dirubah');
        return redirect()->route('Pengguna.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_upps
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_upps)
    {
        $Pengguna = Pengguna::find($id_upps)->delete();
        Alert::success('data berhasil dihapus');
        return redirect()->route('Pengguna.index');
        
    }
}