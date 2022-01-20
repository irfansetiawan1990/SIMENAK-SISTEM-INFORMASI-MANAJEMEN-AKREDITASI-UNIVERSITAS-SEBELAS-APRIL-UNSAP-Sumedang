<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publikasiilmiahmhs;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class PublikasiilmiahmhsController extends Controller
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

   
        $Publikasiilmiahmhs = DB::table('publikasi_ilmiah_mhs')
                ->select('id_publikasi_ilmiah_mhs','jenis_publikasi','ts2','ts1','ts', 
                          DB::raw('(ts2)+(ts1)+(ts) as jumlah'))
              //  ->where('publikasi_ilmiah_mhs.prodi_id')
                ->get();
        


        $sum_ts2 = $Publikasiilmiahmhs->sum('ts2');
        $sum_ts1 = $Publikasiilmiahmhs->sum('ts1');
        $sum_ts =  $Publikasiilmiahmhs->sum('ts');
        $sum_all_ts = $sum_ts2 + $sum_ts1 + $sum_ts;
    
        return view('Publikasiilmiahmhs.index',compact('Publikasiilmiahmhs','id','sum_ts2','sum_ts1','sum_ts','sum_all_ts'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Publikasiilmiahmhs.create');
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
        
            'jenis_publikasi' => 'required|unique:publikasi_ilmiah_mhs|max:100',
            'ts2'=> 'required', 
            'ts1' => 'required',
            'ts'=> 'required',
            'ts'=> 'required',
            'prodi_id' =>'required',
            'tahun' => 'required'
            

        ]);

        Publikasiilmiahmhs::create($request->all());

        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Publikasiilmiahmhs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Publikasiilmiahmhs $Publikasiilmiahmhs)
    {
        return view('Publikasiilmiahmhs.show', compact('Publikasiilmiahmhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Publikasiilmiahmhs $Publikasiilmiahmhs)
    {
        return view ('Publikasiilmiahmhs.edit', compact('Publikasiilmiahmhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publikasiilmiahmhs $id_publikasi_ilmiah_mhs)
    {
        $required -> validate([
    
            'jenis_publikasi' => 'required',
            'ts2'=> 'required', 
            'ts1' => 'required',
            'ts'=> 'required',
            'jumlah' => 'required',
            'prodi_id' =>'required',
            'tahun' => 'required'
            



        ]);

        $Publikasiilmiahmhs->update($request->all());

        Alert::success('Sukses', 'Data Berhasil Dirubah');
        return redirect()->route('Publikasiilmiahmhs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_publikasi_ilmiah_mhs)
    {
        $Publikasiilmiahmhs->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Publikasiilmiahmhs.index');
    }


}
