<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seleksimhsbaru;
use Illuminate\Support\Facades\DB;

class SeleksimhsbaruController extends Controller
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
        $row1 = DB::table('seleksi_mhs_baru')->sum('pendaftar');
        $row2 = DB::table('seleksi_mhs_baru')->sum('lulus_seleksi');
        $row3 = DB::table('seleksi_mhs_baru')->sum('reguler1');
        $row4 = DB::table('seleksi_mhs_baru')->sum('transfer1');
        $row5 = DB::table('seleksi_mhs_baru')->sum('transfer2');
        $row6 = DB::table('seleksi_mhs_baru')->sum('reguler2');
        $totalnm = $row5 + $row6;

        $Seleksimhsbaru = Seleksimhsbaru::latest()->paginate(10);
        return view('Seleksimhsbaru.index',compact('Seleksimhsbaru','row1','row2','row3','row4','totalnm'))
            ->with('i', (request()->input('page', 1) - 1) * 10);


    }

   
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Seleksimhsbaru.create');
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
           'tahun_akademik' => 'required',
           'daya_tampung' => 'required',
           'pendaftar' => 'required',
           'lulus_seleksi' => 'required',
           'reguler1' => 'required',
           'transfer1' => 'required',
           'reguler2' => 'required',
           'transfer2' => 'required'
        ]);

        Seleksimhsbaru::create($request->all());
        return redirect()->route('Seleksimhsbaru.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_seleksi_mhs)
    {
        $Seleksimhsbaru=Seleksimhsbaru::find($id_seleksi_mhs);
        return view('Seleksimhsbaru.show', compact('Seleksimhsbaru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_seleksi_mhs)
    {
        $Seleksimhsbaru=Seleksimhsbaru::find($id_seleksi_mhs);
        return view ('Seleksimhsbaru.edit', compact('Seleksimhsbaru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_seleksi_mhs)
    {
        $request -> validate([
           'tahun_akademik' => 'required',
           'daya_tampung' => 'required',
           'pendaftar' => 'required',
           'lulus_seleksi' => 'required',
           'reguler1' => 'required',
           'transfer1' => 'required',
           'reguler2' => 'required',
           'transfer2' => 'required'
        ]);

        $Seleksimhsbaru=Seleksimhsbaru::find($id_seleksi_mhs)->update($request->all());
        return redirect()->route('Seleksimhsbaru.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_seleksi_mhs)
    {
        $Seleksimhsbaru=Seleksimhsbaru::find($id_seleksi_mhs)->delete();
        return redirect()->route('Seleksimhsbaru.index')
                        ->with('berhasil','data sudah dihapus');
    }

    Public function exportSeleksi(Request $request)
    {
         $request -> validate([
           'tahun_akademik' => 'required',
           'daya_tampung' => 'required',
           'pendaftar' => 'required',
           'lulus_seleksi' => 'required',
           'reguler1' => 'required',
           'transfer1' => 'required',
           'reguler2' => 'required',
           'transfer2' => 'required'
        ]);

        $file = public_path('seleksimahasiswa.rtf');     



        $array = array(
            '[tahun_akademik]' => $request->tahun_akademik,
            '[daya_tampung]' => $request->daya_tampung,
            '[pendaftar]' => $request->pendaftar,
            '[lulus_seleksi]' => $request->lulus_seleksi,
            '[reguler1]' => $request->reguler1,
            '[transfer1]' => $request->transfer1,
            '[reguler2]' => $request->reguler2,
            '[transfer2]' => $request->transfer2,
  
        );
        $nama_file = 'seleksimahasiswa.doc';

        Seleksimhsbaru::exportSeleksi($request->all());
        return WordTemplate::export($file, $array, $nama_file);
    
    }
}