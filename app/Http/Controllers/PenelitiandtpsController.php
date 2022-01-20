<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penelitiandtps;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class PenelitiandtpsController extends Controller
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

       
        $Penelitiandtps = DB::table('penelitian_dtps')
                ->select('id_penelitian','sumber_pembiayaan','ts2','ts1','ts', 
                          DB::raw('(ts2)+(ts1)+(ts) as jumlah'))
                ->where('prodi_id', '=', $id)
                ->get();

        $sum_ts2 = $Penelitiandtps->sum('ts2');
        $sum_ts1 = $Penelitiandtps->sum('ts1');
        $sum_ts = $Penelitiandtps->sum('ts');
        $sum_all_ts = $sum_ts2 + $sum_ts1 + $sum_ts;
   

        return view('Penelitiandtps.index',compact('Penelitiandtps','id','sum_ts2','sum_ts1','sum_ts','sum_all_ts'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    public function edit(Penelitiandtps $Penelitiandtps)
    {
        return view ('Penelitiandtps.input', compact('Penelitiandtps'));
    }


    public function store(Request $request)
    {
        $total = DB::table('penelitian_dtps')->sum('ts2');
        $request-> validate([
        'sumber_pembiayaan' => 'required',
        'ts2' => 'required',
        'ts1'=> 'required',
        'ts'=> 'required',
    



        ]);

        Penelitiandtps::create($request->all());

        return redirect()->route('Penelitiandtps.index');
                    Alert::success('Sukses', 'Data Berhasil Disimpan');




}

    public function update(Request $request, $id_penelitian)
    {
        $request-> validate([
        'sumber_pembiayaan' => 'required',
        'ts2' => 'required',
        'ts1'=> 'required',
        'ts'=> 'required',
        ]);

        $Penelitiandtps = Penelitiandtps::find($id_penelitian)->update($request->all());

        Alert::success('Sukses', 'Data Berhasil dirubah');
        return redirect()->route('Penelitiandtps.index');
                         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_penelitian
    )
    {
        $Penelitiandtps = Penelitiandtps::find($id_penelitian)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Penelitiandtps.index');
                         
    }
}
