<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ipklulusan;

class IpklulusanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.

     */
    public function index()
    {
        $Ipklulusan= Ipklulusan::latest()->paginate(10);

        return view('Ipklulusan.index',compact('Ipklulusan'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Ipklulusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
      \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'tahun_lulus'=> 'required',
        'jml_lulusan'=> 'required',
        'min'=> 'required',
        'rata_rata'=> 'required',
        'maks'=> 'required'
            
        ]);

        Ipklulusan::create($request->all());
        return redirect()->route('Ipklulusan.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
     */
    public function show(Ipklulusan $Ipklulusan)
    {
        return view('Ipklulusan.show', compact('Ipklulusan'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit(Ipklulusan $Ipklulusan)
    {
        return view ('Ipklulusan.edit', compact('Ipklulusan'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, Ipklulusan $Ipklulusan)
    {
        $required -> validate([
            'nama_dosen'=> 'required',
            'dtps' => 'required',
            'ps_akreditasi' => 'required',
            'ps_dalampt' => 'required',
            'ps_luarpt'=> 'required2',
            'penelitian' => 'required1',
            'pkm' => 'required',
            'tugas_tambahan' => 'required',
            'jml_sks' => 'required',
            'rata_rata_persemester' => 'required'

        ]);

        $Ipklulusan->update($request->all());

        return redirect()->route('Ipklulusan.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy(Ipklulusan $Ipklulusan)
    {
        $Ipklulusan->delete();
        return redirect()->route('Ipklulusan.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
