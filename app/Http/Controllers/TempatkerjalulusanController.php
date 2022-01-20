<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tempatkerjalulusan;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class TempatkerjalulusanController extends Controller
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
             $Tempatkerjalulusan = DB::table('tempat_kerja_lulusan')
            ->where('prodi_id','=',$id)
            ->get();


       }
               
       else{

        $Tempatkerjalulusan = Tempatkerjalulusan::simplepaginate(10);
       }
        $jml_lulus = Tempatkerjalulusan::sum('jml_lulusan');
        $jml_terlacak = Tempatkerjalulusan::sum('jml_terlacak');
        $lokal = Tempatkerjalulusan::sum('lokal');
        $nasional = Tempatkerjalulusan::sum('nasional');
        $internasional = Tempatkerjalulusan::sum('internasional');
        
        $prodi = Prodi::all();
        return view('Tempatkerjalulusan.index',compact('Tempatkerjalulusan','id','jml_lulus','jml_terlacak','lokal','nasional','internasional'))
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
        return view('Tempatkerjalulusan.create', compact('id'));
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
        'lokal' => 'required',
        'nasional' => 'required',
        'internasional' => 'required',
        'prodi_id'
        ]);

        Tempatkerjalulusan::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Tempatkerjalulusan.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pkmdtpsmhs $Tempatkerjalulusan)
    {
        return view('Tempatkerjalulusan.show', compact('Tempatkerjalulusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pkmdtpsmhs $Tempatkerjalulusan)
    {
        return view ('Tempatkerjalulusan.edit', compact('Tempatkerjalulusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_tkl)
    {
        $request -> validate([
        'tahun_lulus',
        'jml_lulusan' => 'required',
        'jml_terlacak' => 'required',
        'lokal' => 'required',
        'nasional' => 'required',
        'internasional' => 'required'

        ]);

        $Tempatkerjalulusan = Tempatkerjalulusan::find($id_tkl)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Tempatkerjalulusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @retu
     rn \Illuminate\Http\Response
     */
     public function destroy($id_tkl)
        {
            $Tempatkerjalulusan = Tempatkerjalulusan::find($id_tkl)->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('Tempatkerjalulusan.index');               
        }
}

