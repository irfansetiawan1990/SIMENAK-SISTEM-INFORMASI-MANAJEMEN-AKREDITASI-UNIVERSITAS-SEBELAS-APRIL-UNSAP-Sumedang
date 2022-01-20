<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penelitiandtpsmhs;
use App\Models\Prodi;
use App\Models\Dosentetappt;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class PenelitiandtpsmhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       $id = Auth::user()->prodi_id;

     //  if (auth()->user()->level=="user"){
             $Penelitiandtpsmhs = DB::table('penelitian_dtpsmhs')
            ->join('dosen_tetap_pt', 'penelitian_dtpsmhs.nama_dosen_id', '=', 'dosen_tetap_pt.id')
            ->join('tb_mahasiswa', 'penelitian_dtpsmhs.mhs_id', '=', 'tb_mahasiswa.id_mhs')
            ->select('penelitian_dtpsmhs.*','dosen_tetap_pt.nama_dosen','tb_mahasiswa.nama_mhs')
           // ->where('penelitian_dtpsmhs.prodi_id','=',$id)
            ->get();


       //}
               
     //  else{
      //  $Penelitiandtpsmhs = DB::table('penelitian_dtpsmhs')
      //      ->join('dosen_tetap_pt', 'penelitian_dtpsmhs.nama_dosen_id', '=', 'dosen_tetap_pt.id')
        //    ->join('tb_mahasiswa', 'penelitian_dtpsmhs.mhs_id', '=', 'tb_mahasiswa.id_mhs')
        ///    ->select('penelitian_dtpsmhs.*','dosen_tetap_pt.nama_dosen','tb_mahasiswa.nama_mhs')
          //  ->get();
     //  }
        
        
        $mahasiswa = Mahasiswa::all();
        $dosen =  Dosentetappt::all();
        $prodi = Prodi::all();
        $count = $Penelitiandtpsmhs->count('judul_kegiatan');
        return view('Penelitiandtpsmhs.index',compact('Penelitiandtpsmhs','id','prodi','mahasiswa','dosen','count'))
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
        return view('Penelitiandtpsmhs.create', compact('Prodi','id','mahasiswa','dosen'));
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

        Penelitiandtpsmhs::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Penelitiandtpsmhs.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penelitiandtpsmhs $Penelitiandtpsmhs)
    {
        return view('Penelitiandtpsmhs.show', compact('Penelitiandtpsmhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penelitiandtpsmhs $Penelitiandtpsmhs)
    {
        return view ('Penelitiandtpsmhs.edit', compact('Penelitiandtpsmhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_penelitiandtps_mhs)
    {
        $request -> validate([
        'tema_roadmap' =>'required',
        'mhs_id',
        'judul_kegiatan' =>'required',
        'tahun' =>'required',
     
         

        ]);

        $Penelitiandtpsmhs = Penelitiandtpsmhs::find($id_penelitiandtps_mhs)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Penelitiandtpsmhs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @retu
     rn \Illuminate\Http\Response
     */
     public function destroy($id_penelitiandtps_mhs)
        {
            $Penelitiandtpsmhs = Penelitiandtpsmhs::find($id_penelitiandtps_mhs)->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('Penelitiandtpsmhs.index');
                  
        }
}

