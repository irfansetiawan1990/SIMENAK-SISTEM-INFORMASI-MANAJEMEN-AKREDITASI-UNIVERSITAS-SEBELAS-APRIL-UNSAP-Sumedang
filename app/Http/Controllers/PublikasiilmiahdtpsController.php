<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publikasiilmiahdtps;

class PublikasiilmiahdtpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('role:admin');
    }
    
    public function index()
    {
        $Publikasiilmiahdtps = Publikasiilmiahdtps::latest()->paginate(10);

        return view('Publikasiilmiahdtps.index',compact('Publikasiilmiahdtps'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Publikasiilmiahdtps.create');
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
            'jenis_publikasi' => 'required',
            'ts2' => 'required',
            'ts1'=> 'required',
            'ts'=> 'required',
            'jumlah'=> 'required'

        ]);

        Publikasiilmiahdtps::create($request->all());
        return redirect()->route('Publikasiilmiahdtps.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Publikasiilmiahdtps $Publikasiilmiahdtps)
    {
        return view('Publikasiilmiahdtps.show', compact('Publikasiilmiahdtps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Publikasiilmiahdtps $Publikasiilmiahdtps)
    {
        return view ('Publikasiilmiahdtps.edit', compact('Publikasiilmiahdtps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publikasiilmiahdtps $Publikasiilmiahdtps)
    {
        $request-> validate([
            'jenis_publikasi' => 'required',
            'ts2' => 'required',
            'ts1'=> 'required',
            'ts'=> 'required',
            'jumlah'=> 'required'


        ]);

        $Publikasiilmiahdtps->update($request->all());

        return redirect()->route('Publikasiilmiahdtps.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publikasiilmiahdtps $Publikasiilmiahdtps)
    {
        $Publikasiilmiahdtps->delete();
        return redirect()->route('Publikasiilmiahdtps.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
