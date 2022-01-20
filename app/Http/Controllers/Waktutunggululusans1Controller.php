<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waktutunggululusans1;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class Waktutunggululusans1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       $id = Auth::user()->prodi_id;

       if (auth()->user()->level=="user"){
             $Waktutunggululusans1 = DB::table('waktu_tunggu_lulus_s1')
            ->where('prodi_id','=',$id)
            ->get();


       }
               
       else{

        $Waktutunggululusans1 = Waktutunggululusans1::simplepaginate(10);
       }
        
        $prodi = Prodi::all();
        return view('Waktutunggululusans1.index',compact('Waktutunggululusans1','id'))
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
        return view('Waktutunggululusans1.create', compact('id'));
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
        
        'tahun_lulus' => 'required',
        'jml_lulusan' => 'required',
        'jml_terlacak' => 'required',
        'wt1' => 'required',
        'wt2' => 'required',
        'wt3' => 'required',
        'prodi_id'
        ]);

        Waktutunggululusans1::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Waktutunggululusans1.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pkmdtpsmhs $Waktutunggululusans1)
    {
        return view('Waktutunggululusans1.show', compact('Waktutunggululusans1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pkmdtpsmhs $Waktutunggululusans1)
    {
        return view ('Waktutunggululusans1.edit', compact('Waktutunggululusans1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_tunggu_lulusan)
    {
        $request -> validate([
        'tahun_lulus',
        'jml_lulusan' => 'required',
        'jml_terlacak' => 'required',
        'wt1' => 'required',
        'wt2' => 'required',
        'wt3' => 'required'  
        ]);

        $Waktutunggululusans1 = Waktutunggululusans1::find($id_tunggu_lulusan)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Waktutunggululusans1.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @retu
     rn \Illuminate\Http\Response
     */
     public function destroy($id_tunggu_lulusan)
        {
            $Waktutunggululusans1 = Waktutunggululusans1::find($id_tunggu_lulusan)->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('Waktutunggululusans1.index');               
        }
}

