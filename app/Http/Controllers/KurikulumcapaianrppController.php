<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kurikulumcapaianrpp;
use App\Models\Prodi;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class KurikulumcapaianrppController extends Controller
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

        $Prodi = Prodi::all();
        $Matkul = Matakuliah::all();

        $id = Auth::user()->prodi_id;

        if (auth()->user()->level=="user"){
             $Kurikulumcapaianrpp = DB::table('kurikulum_capaian_rpp')
                ->join('tb_matkul', 'kurikulum_capaian_rpp.matkul_id', '=', 'tb_matkul.id')
                ->where('prodi_id', '=', $id)
                ->get();
                }

        else {

        $Kurikulumcapaianrpp = Kurikulumcapaianrpp::latest()->simplepaginate(10);
        }

        $total_matkomp= DB::table('kurikulum_capaian_rpp')
                ->count('matkul_komp');

        $total_kul = $Kurikulumcapaianrpp->SUM('kuliah_responsi_tutor');
        $total_seminar = $Kurikulumcapaianrpp->SUM('seminar');
        $total_praktik = $Kurikulumcapaianrpp->SUM('praktik');
        $total_konversi = $Kurikulumcapaianrpp->SUM('konversi');
        return view('Kurikulumcapaianrpp.index',compact('Kurikulumcapaianrpp','id','Matkul', 'total_matkomp','total_kul','total_seminar', 'total_seminar', 'total_praktik','total_konversi'))
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
        $Matkul = Matakuliah::all();
        $id = Auth::user()->prodi_id;
        return view('Kurikulumcapaianrpp.create', compact('Matkul','Prodi','id'));
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
        
  
             'matkul_id'                        => 'required',         
             'matkul_komp'                      ,         
             'kuliah_responsi_tutor'            => 'required',         
             'seminar'                          => 'required',         
             'praktik'                          => 'required',         
             'konversi'                         => 'required',         
             'cpl_sikap'                                    ,         
             'cpl_pengetahuan'                              ,         
             'cpl_keterampilan_umum'                        ,         
             'cpl_keterampilan_khusus'                      ,         
             'dokumen_rencana_pembelajaran'     => 'required',         
             'unit_penyelenggara'               => 'required',         
             'prodi_id'                         => 'required'

        ]);

        Kurikulumcapaianrpp::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Kurikulumcapaianrpp.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kurikulumcapaianrpp $Kurikulumcapaianrpp)
    {
        return view('Kurikulumcapaianrpp.show', compact('Kurikulumcapaianrpp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kurikulumcapaianrpp $Kurikulumcapaianrpp)
    {
        return view ('Kurikulumcapaianrpp.edit', compact('Kurikulumcapaianrpp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kurikulum_capaian_rpp)
    {
        $request -> validate([
      
               
             'matkul_komp'                      ,         
             'kuliah_responsi_tutor'            => 'required',         
             'seminar'                          => 'required',         
             'praktik'                          => 'required',         
             'konversi'                         => 'required',         
             'cpl_sikap'                                    ,         
             'cpl_pengetahuan'                              ,         
             'cpl_keterampilan_umum'                        ,         
             'cpl_keterampilan_khusus'                      ,         
             'dokumen_rencana_pembelajaran'     => 'required',         
             'unit_penyelenggara'               => 'required',         
    
       



        ]);

        $Kurikulumcapaianrpp = Kurikulumcapaianrpp::find($id_kurikulum_capaian_rpp)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Kurikulumcapaianrpp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @retu
     rn \Illuminate\Http\Response
     */
     public function destroy($id_kurikulum_capaian_rpp)
    {
        $Kurikulumcapaianrpp = Kurikulumcapaianrpp::find($id_kurikulum_capaian_rpp)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Kurikulumcapaianrpp.index');
              
    }
}
