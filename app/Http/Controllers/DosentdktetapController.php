<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosentdktetap;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class DosentdktetapController extends Controller
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
        //untuk isian prodi
        $id = Auth::user()->prodi_id;

        //menampilkan hanya berdasarkan prodi
        if (auth()->user()->level=="user")
        $Dosentdktetap = DB::table('dosen_tdk_tetap')
                ->where('prodi_id', '=', $id)
                ->get();   
        else

        //menampilkan semua prodi
        //$Dosentdktetap = DB::table('dosen_tdk_tetap')
               // ->join('dosen_tdk_tetap', 'prodi_id', '=', 'tb_prodi.id')
              //  ->select('dosen_tdk_tetap.*', 'tb_prodi.nama_prodi')
              //  ->get();
        $Dosentdktetap = Dosentdktetap::simplepaginate(10);

        return view('Dosentdktetap.index',compact('Dosentdktetap','id'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dosentdktetap.create');
    }

    /**
     * Store a newly created resource in storage.
     *
      \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dosen'=> 'required|unique:dosen_tdk_tetap|max:100',
            //uniqe tabel
            'pen_pas_sarjana'=> 'required',
            'bid_keahlian'=> 'required',
            'jabatan_akademik'=> 'required',
            'serdikprof'=> 'required',
            'serkomprof'=> 'required',
            'matkul_ps_akre'=> 'required',
            'kesbid_matkul'=> 'required',
            'prodi_id' => 'required'

        ]);

        Dosentdktetap::create($request->all());

        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Dosentdktetap.index');
                  
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
     */
    public function show($id_dosen_tdk_tetap)
    {
        return view('Dosentdktetap.show', compact('Dosentdktetap'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id_dosen_tdk_tetap)
    {
        return view ('Dosentdktetap.edit', compact('Dosentdktetap'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, $id_dosen_tdk_tetap)
    {
        $request-> validate([
            'nama_dosen'=> 'required',
            'pen_pas_sarjana'=> 'required',
            'bid_keahlian'=> 'required',
            'jabatan_akademik'=> 'required',
            'serdikprof'=> 'required',
            'serkomprof'=> 'required',
            'matkul_ps_akre'=> 'required',
            'kesbid_matkul'=> 'required'
 

        ]);

        $Dosentdktetap = Dosentdktetap::find($id_dosen_tdk_tetap)->update($request->all());

        Alert::success('Sukses', 'Data Berhasil Dirubah');
        return redirect()->route('Dosentdktetap.index');
                  
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy($id_dosen_tdk_tetap)
    {
        $Dosentdktetap = Dosentdktetap::find($id_dosen_tdk_tetap)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Dosentdktetap.index');
                       
    }
}
