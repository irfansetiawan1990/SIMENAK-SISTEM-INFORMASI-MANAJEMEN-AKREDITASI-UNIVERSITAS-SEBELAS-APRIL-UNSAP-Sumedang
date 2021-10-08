<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggunaandana;

class PenggunaandanaController extends Controller
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
        $Penggunaandana = Penggunaandana::latest()->paginate(10);

        return view('Penggunaandana.index',compact('Penggunaandana'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Penggunaandana.create');
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
        'ts2_pengelola' => 'required',
        'ts1_pengelola' => 'required',
        'ts_pengelola' => 'required',
        'rata-rata_pengelola'  => 'required',
        'ts2_ps' => 'required',
        'ts1_ps' => 'required',
        'ts_ps'  => 'required',
        'rata-rata_ps'  => 'required',
        ]);

        Penggunaandana::create($request->all());
        return redirect()->route('Penggunaandana.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penggunaandana $Penggunaandana)
    {
        return view('Penggunaandana.show', compact('Penggunaandana'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penggunaandana $Penggunaandana)
    {
        return view ('Penggunaandana.edit', compact('Penggunaandana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penggunaandana $Penggunaandana)
    {
        $required -> validate([
        'ts2_pengelola' => 'required',
        'ts1_pengelola' => 'required',
        'ts_pengelola' => 'required',
        'rata-rata_pengelola'  => 'required',
        'ts2_ps' => 'required',
        'ts1_ps' => 'required',
        'ts_ps'  => 'required',
        'rata-rata_ps'  => 'required'

        ]);

        $Penggunaandana->update($request->all());

        return redirect()->route('Penggunaandana.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penggunaandana $Penggunaandana)
    {
        $Penggunaandana->delete();
        return redirect()->route('Penggunaandana.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
