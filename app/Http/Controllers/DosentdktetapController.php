<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosentdktetap;
class DosentdktetapController extends Controller
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
        $Dosentdktetap= Dosentdktetap::latest()->paginate(10);

        return view('Dosentdktetap.index',compact('Dosentdktetap'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dosentdktetap.create');
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
            'ts2' => 'required',
            'ts1' => 'required',
            'ts' => 'required',
            'ts_2'=> 'required2',
            'ts_1' => 'required1',
            'ts_' => 'required',
            'rata_rata' => 'required',
            'jumlah_bimbingan_semester' => 'required'

        ]);

        Dosentdktetap::create($request->all());
        return redirect()->route('Dosentdktetap.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
     */
    public function show(Dosentdktetap $Dosentdktetap)
    {
        return view('Dosentdktetap.show', compact('Dosentdktetap'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit(Dosentdktetap $Dosentdktetap)
    {
        return view ('Dosentdktetap.edit', compact('Dosentdktetap'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, Dosentdktetap $Dosentdktetap)
    {
        $required -> validate([
            'nama_dosen'=> 'required',
            'ts2' => 'required',
            'ts1' => 'required',
            'ts' => 'required',
            'ts_2'=> 'required2',
            'ts_1' => 'required1',
            'ts_' => 'required',
            'rata_rata' => 'required',
            'jumlah_bimbingan_semester' => 'required'

        ]);

        $Dosentdktetap->update($request->all());

        return redirect()->route('Dosentdktetap.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy(Dosentdktetap $Dosentdktetap)
    {
        $Dosentdktetap->delete();
        return redirect()->route('Dosentdktetap.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
