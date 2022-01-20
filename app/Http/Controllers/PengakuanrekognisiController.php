<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengakuanrekognisi;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class PengakuanrekognisiController extends Controller
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
        $t_wilayah = DB::table('rekognisi_dtps')->count('wilayah');
        $t_nasional = DB::table('rekognisi_dtps')->count('nasional');
        $t_internasional = DB::table('rekognisi_dtps')->count('internasional');
        $id = Auth::user()->prodi_id;

        if (auth()->user()->level=="user")
        $Pengakuanrekognisi = DB::table('rekognisi_dtps')
                ->where('prodi_id', '=', $id)
                ->get();
        else
            
        $Pengakuanrekognisi= Pengakuanrekognisi::latest()->paginate(10);
        return view('Pengakuanrekognisi.index',compact('Pengakuanrekognisi','id','t_wilayah','t_nasional','t_internasional'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pengakuanrekognisi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
      \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dosen' => 'required | unique:rekognisi_dtps',
            'bidang_keahlian' => 'required',
	   		'rekognisi_bukti' => 'required',
	   		'wilayah' ,
	   		'nasional',
	   		'internasional',
	   		'tahun'  => 'required',
            'prodi_id'  => 'required'

        ]);

        Pengakuanrekognisi::create($request->all());
        Alert::success('Sukses', 'Data Berhasil disimpan');
        return redirect()->route('Pengakuanrekognisi.index');
                        
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
     */
    public function show(Pengakuanrekognisi $Pengakuanrekognisi)
    {
        return view('Pengakuanrekognisi.show', compact('Pengakuanrekognisi'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit(Pengakuanrekognisi $Pengakuanrekognisi)
    {
        return view ('Pengakuanrekognisi.edit', compact('Pengakuanrekognisi'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, $id_rekognisi)
    {
        $requiredd -> validate([
      
	   		'nama_dosen' => 'required',
            'bidang_keahlian' => 'required',
            'rekognisi_bukti' => 'required',
            'wilayah'  => 'required',
            'nasional'  => 'required',
            'internasional'  => 'required',
            'tahun'  => 'required'
      

        ]);

        $Pengakuanrekognisi = Pengakuanrekognisi::find($id_rekognisi)->update($request->all());

        Alert::success('Sukses', 'Data Berhasil dirubah');
        return redirect()->route('Pengakuanrekognisi.index');
                      
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy($id_rekognisi)
    {
        $Pengakuanrekognisi = Pengakuanrekognisi::find($id_rekognisi)->delete();

        Alert::success('Sukses', 'Data Berhasil dihapus');
        return redirect()->route('Pengakuanrekognisi.index');
                        
    }
}
