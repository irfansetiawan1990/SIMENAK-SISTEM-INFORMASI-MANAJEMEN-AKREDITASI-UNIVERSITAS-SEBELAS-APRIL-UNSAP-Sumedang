<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepuasanpengguna;
use App\Models\Prodi;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class KepuasanpenggunaController extends Controller
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
        $pengguna = Auth::user()->name;
        $id_user = Auth::user()->id;
        $id = Auth::user()->prodi_id;

        $komentar = DB::table('tb_komentar')
                ->join('users','tb_komentar.user_id','users.id')
                ->where('halaman_id', '=', 1)
                ->orderBy('users.created_at','DESC','LIMI','=','1')
                ->get();



        if (auth()->user()->level=="user"){
             $Kepuasanpengguna = DB::table('kepuasan_pengguna')
                ->where('prodi_id', '=', $id)
                ->get();
                }

        else {

        $Kepuasanpengguna = Kepuasanpengguna::latest()->simplepaginate(10);
        }

       $total_sb = $Kepuasanpengguna->SUM('sangat_baik');
       $total_b = $Kepuasanpengguna->SUM('baik');
       $total_c = $Kepuasanpengguna->SUM('cukup');
       $total_k = $Kepuasanpengguna->SUM('kurang');
        return view('Kepuasanpengguna.index',compact('Kepuasanpengguna','id','total_sb','total_b','total_c','total_k','pengguna','id_user','komentar'))
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
        return view('Kepuasanpengguna.create', compact('id'));
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
            'jenis_kemampuan' => 'required',
            'sangat_baik' => 'required',
            'baik' => 'required',
            'cukup' => 'required',
            'kurang' => 'required',
            'tindak_lanjut' => 'required',
            'prodi_id'

        ]);

        Kepuasanpengguna::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Kepuasanpengguna.index');
                        
    }
    public function komenstore(Request $request)
    {

        $request->validate([
            'halaman_id' => 'required',
            'user_id' => 'required',
            'parent',
            'komentar' => 'required'

        ]);

        Komentar::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Kepuasanpengguna.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kepuasanpengguna $Kepuasanpengguna)
    {
        
        return view('Kepuasanpengguna.show', compact('Kepuasanpengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kepuasanpengguna $Kepuasanpengguna)
    {
        return view ('Kepuasanpengguna.edit', compact('Kepuasanpengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kp)
    {
        $request -> validate([
            'jenis_kemampuan' => 'required',
            'sangat_baik' => 'required',
            'baik' => 'required',
            'cukup' => 'required',
            'kurang' => 'required',
            'tindak_lanjut' => 'required',
        ]);

        $Kepuasanpengguna = Kepuasanpengguna::find($id_kp)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Kepuasanpengguna.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @retu
     rn \Illuminate\Http\Response
     */
     public function destroy($id_kp)
    {
        $Kepuasanpengguna = Kepuasanpengguna::find($id_kp)->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('Kepuasanpengguna.index');
              
    }
}
