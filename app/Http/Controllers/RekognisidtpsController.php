<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\Rekognisidtps;
use\App\Models\Matakuliah;
use\App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;



class RekognisidtpsController extends Controller
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

        $id = Auth::user()->prodi_id;

        if (auth()->user()->level=="user")
        $Rekognisidtps = DB::table('rekognisi_dtps')
                ->where('prodi_id', '=', $id)
                ->get();
        else

        $Rekognisidtps = Rekognisidtps::simplepaginate(10);

        return view('Rekognisidtps.index',compact('Rekognisidtps','id'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Rekognisidtps.create');
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
                'nama_dosen'=> 'required | unique | max:100',
                'bidang_keahlian' => 'required',
                'rkg_bkt_pendukung'=> 'required',
                'wilayah'=> 'required',
                'nasional'=> 'required',
                'internasional'=> 'required',
                'tahun'=> 'required',
                'prodi_id'=> 'required',
        ]);

        
        if Rekognisidtps::create($request->all());
        Alert::success('Sukses','Data berhasil Disimpan');
        else 
        Alert::warning('Perhatian','Periksa Kembali Inputan Anda');

        return redirect()->route('Rekognisidtps.index');

                      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_rekognisi)
    {
        $Rekognisidtps = Rekognisidtps::find($id_rekognisi);
        return view('Rekognisidtps.show', compact('Rekognisidtps'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id_rekognisi)
    {
        $Rekognisidtps=Rekognisidtps::find($id_rekognisi);
        return view ('Rekognisidtps.edit', compact('Rekognisidtps'));
    }

    /**
  
     */
    public function update(Request $request, $id_rekognisi)
    {
       
        $request->validate([
                'nama_dosen'=> 'required | unique | max:100',
                'bidang_keahlian' => 'required',
                'rkg_bkt_pendukung'=> 'required',
                'wilayah'=> 'required',
                'nasional'=> 'required',
                'internasional'=> 'required',
                'tahun'=> 'required',
                'prodi_id'=> 'required',
        ]);

        
        if Rekognisidtps::find($id_rekognisi)->update($request->all());
        Alert::success('Sukses','Data berhasil Disimpan');
        else 
        Alert::warning('Perhatian','Periksa Kembali Inputan Anda');

        return redirect()->route('Rekognisidtps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_rekognisi)
    {
        $Rekognisidtps = Rekognisidtps::find($id_rekognisi)->delete();
        return redirect()->route('Rekognisidtps.index')
                        ->with('berhasil','data sudah dihapus');
    }
}