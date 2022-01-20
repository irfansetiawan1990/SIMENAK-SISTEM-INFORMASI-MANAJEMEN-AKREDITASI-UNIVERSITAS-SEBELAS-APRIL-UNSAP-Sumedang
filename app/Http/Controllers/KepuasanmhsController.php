<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepuasanmhs;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class KepuasanmhsController extends Controller
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

        $id = Auth::user()->prodi_id;

        if (auth()->user()->level=="user"){
             $kepuasanmhs = DB::table('kepuasan_mhs')
                ->where('prodi_id', '=', $id)
                ->get();
                }

        else {

        $kepuasanmhs = Kepuasanmhs::latest()->simplepaginate(10);
        }

      //  $total_matkomp= DB::table('kurikulum_capaian_rpp')
             //   ->count('matkul_komp');

       $total_sb = $kepuasanmhs->SUM('sangat_baik');
       $total_b = $kepuasanmhs->SUM('baik');
       $total_c = $kepuasanmhs->SUM('cukup');
       $total_k = $kepuasanmhs->SUM('kurang');
        return view('Kepuasanmhs.index',compact('kepuasanmhs','id','total_sb','total_b','total_c','total_k'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->prodi_id;
        return view('Kepuasanmhs.create', compact('id'));
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
        'aspek_yg_diukur' => 'required',
        'sangat_baik' => 'required',
        'baik' => 'required',
        'cukup' => 'required',
        'kurang' => 'required',
        'rencana_tindak_lanjut' => 'required',
        'prodi_id'=> 'required'

        ]);

        Kepuasanmhs::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Kepuasanmhs.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(kepuasan_mhs $kepuasanmhs)
    {
        return view('Kepuasanmhs.show', compact('kepuasanmhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(kepuasan_mhs $kepuasanmhs)
    {
        return view ('Kepuasanmhs.edit', compact('kepuasan_mhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kepuasanmhs)
    {
        $request -> validate([

        'sangat_baik' => 'required',
        'baik' => 'required',
        'cukup' => 'required',
        'kurang' => 'required',
        'rencana_tindak_lanjut' => 'required',
        'prodi_id'
        ]);

        $kepuasanmhs = Kepuasanmhs::find($id_kepuasanmhs)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Kepuasanmhs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @retu
     rn \Illuminate\Http\Response
     */
     public function destroy($id_kepuasanmhs)
    {
        $kepuasanmhs = Kepuasanmhs::find($id_kepuasanmhs)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Kepuasanmhs.index');
              
    }
}
