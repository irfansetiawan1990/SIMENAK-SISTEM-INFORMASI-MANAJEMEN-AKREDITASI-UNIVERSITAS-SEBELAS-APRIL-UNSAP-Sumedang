<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pkmdtps;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class PkmdtpsController extends Controller
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
             
        $Pkmdtps = DB::table('pkm_dtps')
                ->select('id_pkm_dtps','sumber_pembiayaan','ts2','ts1','ts', 
                          DB::raw('(ts2)+(ts1)+(ts) as jumlah'))
                ->where('prodi_id', '=', $id)
                ->get();

        $sum_ts2 = $Pkmdtps->sum('ts2');

        $sum_ts1 = $Pkmdtps->sum('ts1');

        $sum_ts =  $Pkmdtps->sum('ts');

        $sum_all_ts = $sum_ts2 + $sum_ts1 + $sum_ts;

        return view('Pkmdtps.index',compact('Pkmdtps','id','sum_ts2','sum_ts1','sum_ts','sum_all_ts'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    public function edit(Pkmdtps $Pkmdtps)
    {
        return view ('Pkmdtps.input', compact('Pkmdtps'));
    }


    public function store(Request $request)
    {
        $total = DB::table('pkm_dtps')->sum('ts2');
        $request-> validate([
        'sumber_pembiayaan' => 'required',
        'ts2' => 'required',
        'ts1'=> 'required',
        'ts'=> 'required',
    



        ]);

        Pkmdtps::create($request->all());

        return redirect()->route('Pkmdtps.index');
                    Alert::success('Sukses', 'Data Berhasil Disimpan');




}

    public function update(Request $request, $id_pkm_dtps)
    {
        $request-> validate([
        'sumber_pembiayaan' => 'required',
        'ts2' => 'required',
        'ts1'=> 'required',
        'ts'=> 'required',
        ]);

        $Pkmdtps = Pkmdtps::find($id_pkm_dtps)->update($request->all());

        Alert::success('Sukses', 'Data Berhasil dirubah');
        return redirect()->route('Pkmdtps.index');
                         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pkm_dtps
    )
    {
        $Pkmdtps = Pkmdtps::find($id_pkm_dtps)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Pkmdtps.index');
                         
    }
}
