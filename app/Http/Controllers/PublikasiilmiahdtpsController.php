<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publikasiilmiahdtps;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class PublikasiilmiahdtpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       
        $Prodi = Prodi::all();

        $id = Auth::user()->prodi_id;
             
        $Publikasiilmiahdtps = DB::table('publikasi_ilmiah_dtps')
                ->select('id_publikasi','media_publikasi','ts2','ts1','ts', 
                          DB::raw('(ts2)+(ts1)+(ts) as jumlah'))
                ->where('prodi_id', '=', $id)
                ->get();

        $sum_ts2 = $Publikasiilmiahdtps->sum('ts2');
        $sum_ts1 = $Publikasiilmiahdtps->sum('ts1');
        $sum_ts =  $Publikasiilmiahdtps->sum('ts');
        $sum_all_ts = $sum_ts2 + $sum_ts1 + $sum_ts;

        return view('Publikasiilmiahdtps.index',compact('Publikasiilmiahdtps','id','sum_ts2','sum_ts1','sum_ts','sum_all_ts'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    public function edit(Publikasiilmiahdtps $Publikasiilmiahdtps)
    {
        return view ('Publikasiilmiahdtps.input', compact('Publikasiilmiahdtps'));
    }


    public function store(Request $request)
    {
      
        $request-> validate([
        'media_publikasi' => 'required',
        'ts2' => 'required',
        'ts1'=> 'required',
        'ts'=> 'required',
        'prodi_id'=> 'required'
    



        ]);

        Publikasiilmiahdtps::create($request->all());

        return redirect()->route('Publikasiilmiahdtps.index');
                    Alert::success('Sukses', 'Data Berhasil Disimpan');




}

    public function update(Request $request, $id_publikasi)
    {
        $request-> validate([
        'media_publikasi' => 'required',
        'ts2' => 'required',
        'ts1'=> 'required',
        'ts'=> 'required'

    
        ]);

        $Publikasiilmiahdtps = Publikasiilmiahdtps::find($id_publikasi)->update($request->all());

        Alert::success('Sukses', 'Data Berhasil dirubah');
        return redirect()->route('Publikasiilmiahdtps.index');
                         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_publikasi)
    {
        $Publikasiilmiahdtps = Publikasiilmiahdtps::find($id_publikasi)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Publikasiilmiahdtps.index');
                         
    }
}
