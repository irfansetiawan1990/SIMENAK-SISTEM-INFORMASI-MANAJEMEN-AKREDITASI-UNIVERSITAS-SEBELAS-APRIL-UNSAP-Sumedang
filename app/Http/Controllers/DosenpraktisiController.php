<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosenpraktisi;

class DosenpraktisiController extends Controller
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
        $Dosenpraktisi= Dosenpraktisi::latest()->paginate(10);

        return view('Dosenpraktisi.index',compact('Dosenpraktisi'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dosenpraktisi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
      \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dosen'=> 'required',
            'nidk' => 'required',
            'perusahaan' => 'required',
            'pend_tertinggi' => 'required',
            'bid_keahlian'=> 'required2',
            'sertifikat' => 'required1',
            'matkul_yg_diampu' => 'required',
            'bobot_kredit' => 'required'

        ]);

        Dosenpraktisi::create($request->all());
        return redirect()->route('Dosenpraktisi.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
     */
    public function show(Dosenpraktisi $Dosenpraktisi)
    {
        return view('Dosenpraktisi.show', compact('Dosenpraktisi'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit(Dosenpraktisi $Dosenpraktisi)
    {
        return view ('Dosenpraktisi.edit', compact('Dosenpraktisi'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, Dosenpraktisi $Dosenpraktisi)
    {
        $required -> validate([
            'nama_dosen'=> 'required',
            'nidk' => 'required',
            'perusahaan' => 'required',
            'pend_tertinggi' => 'required',
            'bid_keahlian'=> 'required2',
            'sertifikat' => 'required1',
            'matkul_yg_diampu' => 'required',
            'bobot_kredit' => 'required'

        ]);

        $Dosenpraktisi->update($request->all());

        return redirect()->route('Dosenpraktisi.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy(Dosenpraktisi $Dosenpraktisi)
    {
        $Dosenpraktisi->delete();
        return redirect()->route('Dosenpraktisi.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
