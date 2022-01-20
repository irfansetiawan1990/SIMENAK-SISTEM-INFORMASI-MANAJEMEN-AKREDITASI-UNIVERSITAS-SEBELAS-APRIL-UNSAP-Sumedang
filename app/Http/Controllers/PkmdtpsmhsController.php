<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pkmdtpsmhs;
use App\Models\Prodi;
use App\Models\Dosentetappt;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class PkmdtpsmhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       $id = Auth::user()->prodi_id;

      // if (auth()->user()->level=="user"){
             $Pkmdtpsmhs = DB::table('pkm_dtps_mhs')
            ->join('dosen_tetap_pt', 'pkm_dtps_mhs.nama_dosen_id', '=', 'dosen_tetap_pt.id')
            ->join('tb_mahasiswa', 'pkm_dtps_mhs.mhs_id', '=', 'tb_mahasiswa.id_mhs')
            ->select('pkm_dtps_mhs.*','dosen_tetap_pt.nama_dosen','tb_mahasiswa.nama_mhs')
           // ->where('pkm_dtps_mhs.prodi_id','=',$id)
            ->get();


      // }
               
      // else{
      //  $Pkmdtpsmhs = Pkmdtpsmhs::simplepaginate(10);
     //  }
        
        
        $mahasiswa = Mahasiswa::all();
        $dosen =  Dosentetappt::all();
        $prodi = Prodi::all();
        $count = $Pkmdtpsmhs->count('judul_kegiatan');
        return view('Pkmdtpsmhs.index',compact('Pkmdtpsmhs','id','prodi','mahasiswa','dosen','count'))
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
        $mahasiswa = Mahasiswa::all();
        $dosen =  Dosentetappt::all();
        $id = Auth::user()->prodi_id;
        return view('Pkmdtpsmhs.create', compact('Prodi','id','mahasiswa','dosen'));
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
        
        'nama_dosen_id' =>'required',
        'tema_roadmap' =>'required',
        'mhs_id' ,
        'judul_kegiatan' =>'required',
        'tahun' =>'required',
        'prodi_id'  
   

        ]);

        Pkmdtpsmhs::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Pkmdtpsmhs.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pkmdtpsmhs $Pkmdtpsmhs)
    {
        return view('Pkmdtpsmhs.show', compact('Pkmdtpsmhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pkmdtpsmhs $Pkmdtpsmhs)
    {
        return view ('Pkmdtpsmhs.edit', compact('Pkmdtpsmhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pkm_dtps_mhs)
    {
        $request -> validate([
        'tema_roadmap' =>'required',
        'mhs_id',
        'judul_kegiatan' =>'required',
        'tahun' =>'required',
     
         

        ]);

        $Pkmdtpsmhs = Pkmdtpsmhs::find($id_pkm_dtps_mhs)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Pkmdtpsmhs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @retu
     rn \Illuminate\Http\Response
     */
     public function destroy($id_pkm_dtps_mhs)
        {
            $Pkmdtpsmhs = Pkmdtpsmhs::find($id_pkm_dtps_mhs)->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('Pkmdtpsmhs.index');
                  
        }
}

