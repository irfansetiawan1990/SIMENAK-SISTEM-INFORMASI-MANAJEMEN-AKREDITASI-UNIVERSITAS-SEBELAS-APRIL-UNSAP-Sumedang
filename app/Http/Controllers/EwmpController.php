<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ewmp;

class EwmpController extends Controller
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
        $ewmp= Ewmp::latest()->paginate(10);

        return view('Ewmp.index',compact('Ewmp'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Ewmp.create');
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

        Ewmp::create($request->all());
        return redirect()->route('Ewmp.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
     */
    public function show($id_ewmp_dosen)
    {

        return view('Ewmp.show', compact('Ewmp'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id_ewmp_dosen)
    {

        return view ('Ewmp.edit', compact('Ewmp'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, $id_ewmp_dosen)
    {
        $request -> validate([
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

        $ewmp = Ewmp::find($id_ewmp_dosen)->update($request->all());

        return redirect()->route('Ewmp.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy($id_ewmp_dosen)
    {
        $ewmp = Ewmp::find($id_ewmp_dosen)->delete();
        return redirect()->route('Ewmp.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
