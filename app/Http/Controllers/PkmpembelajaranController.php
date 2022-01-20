<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pkmpembelajaran;
use App\Models\Prodi;
use App\Models\Dosentetappt;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class PkmpembelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $id = Auth::user()->prodi_id;

    //   if (auth()->user()->level=="user"){
             $Pkmpembelajaran = DB::table('pkm_pembelajaran')
            ->join('dosen_tetap_pt', 'pkm_pembelajaran.nama_dosen_id', '=', 'dosen_tetap_pt.id')
            ->join('tb_matkul', 'pkm_pembelajaran.mata_kuliah_id', '=', 'tb_matkul.id')
            ->select('pkm_pembelajaran.*','dosen_tetap_pt.nama_dosen','tb_matkul.nama_matkul')
            //->where('pkm_pembelajaran.prodi_id','=',$id)
            ->get();


     //  }
               
     //  else{
    //    $Pkmpembelajaran = Pkmpembelajaran::simplepaginate(10);
    //   }
        
        $matkul = Matakuliah::all();
        $dosen =  Dosentetappt::all();
        $prodi = Prodi::all();
        return view('Pkmpembelajaran.index',compact('Pkmpembelajaran','id','prodi','matkul','dosen'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Prodi = Prodi::all();
        $matkul = Matakuliah::all();
        $dosen = Dosentetappt::all();
        $id = Auth::user()->prodi_id;
        return view('Pkmpembelajaran.create', compact('matkul','Prodi','id','dosen'));
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
        'judul_pkm' => 'required',          
        'nama_dosen_id',          
        'mata_kuliah_id',          
        'bentuk_integrasi'=> 'required',              
        'prodi_id' => 'required'    
  
   

        ]);

        Pkmpembelajaran::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Pkmpembelajaran.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pkmpembelajaran $Pkmpembelajaran)
    {
        return view('Pkmpembelajaran.show', compact('Pkmpembelajaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pkmpembelajaran $Pkmpembelajaran)
    {
        return view ('Pkmpembelajaran.edit', compact('Pkmpembelajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pkm_pembelajaran)
    {
        $request -> validate([

        'judul_pkm' => 'required',          
        'nama_dosen',          
        'mata_kuliah',           
        'bentuk_integrasi'=> 'required'
         

        ]);

        $Pkmpembelajaran = Pkmpembelajaran::find($id_pkm_pembelajaran)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Pkmpembelajaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @retu
     rn \Illuminate\Http\Response
     */
     public function destroy($id_pkm_pembelajaran)
        {
            $Pkmpembelajaran = Pkmpembelajaran::find($id_pkm_pembelajaran)->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('Pkmpembelajaran.index');
                  
        }
}

