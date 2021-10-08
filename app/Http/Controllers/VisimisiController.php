<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visimisi;
use\App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;



class VisimisiController extends Controller
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
        $prodi = Prodi::all();
        $user = Auth::user()->prodi->nama_prodi;
        //untuk isian prodi
        $id = Auth::user()->prodi_id;

        //menampilkan hanya berdasarkan prodi
        if (auth()->user()->level=="user")
        $visimisi = DB::table('vmts')
                ->where('prodi_id', '=', $id)

                ->get();   
        else

        //menampilkan semua prodi
        $visimisi = DB::table('tb_prodi')
                ->join('vmts', 'prodi_id', '=', 'tb_prodi.id')
                ->select('vmts.*', 'tb_prodi.nama_prodi')
                ->get();

        return view('visimisi.index',compact('visimisi','id','user'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $user = Auth::user()->prodi->nama_prodi;
        $id = Auth::user()->prodi_id;
   
        return view('visimisi.create',compact('id','user'));


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
            'visimisi'=> 'required',
            'tahun_awal'=> 'required',
            'tahun_akhir'=> 'required',
            'prodi_id'=> 'required'
 

        ]);

        Visimisi::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('visimisi.index');
                        //->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Visimisi $visimisi)
    {
        $user = Auth::user()->prodi->nama_prodi;
        return view('visimisi.show', compact('visimisi','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Visimisi $visimisi)
    {
        $user = Auth::user()->prodi->nama_prodi;
        return view('visimisi.edit', compact('visimisi','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visimisi $visimisi)
    {
        $request-> validate([
            'visimisi'=> 'required',
            'tahun_awal'=> 'required',
            'tahun_akhir'=> 'required',
        ]);

        $visimisi->update($request->all());

        Visimisi::create($request->all());
            Alert::success('Sukses', 'Data Berhasil Dirubah');
            return redirect()->route('visimisi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visimisi $visimisi)
    {
        $visimisi->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->route('visimisi.index');
                        //->with('berhasil','data sudah dihapus');
    }
}
