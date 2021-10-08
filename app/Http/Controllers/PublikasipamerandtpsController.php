<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publikasipamerandtps;

class PublikasipamerandtpsController extends Controller
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
        $Publikasipamerandtps = Publikasipamerandtps::latest()->paginate(10);

        return view('Publikasipamerandtps.index',compact('Publikasipamerandtps'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Publikasipamerandtps.create');
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

        Publikasipamerandtps::create($request->all());
        return redirect()->route('Publikasipamerandtps.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Publikasipamerandtps $Publikasipamerandtps)
    {
        return view('Publikasipamerandtps.show', compact('Publikasipamerandtps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Publikasipamerandtps $Publikasipamerandtps)
    {
        return view ('Publikasipamerandtps.edit', compact('Publikasipamerandtps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publikasipamerandtps $Publikasipamerandtps)
    {
        $request-> validate([
            'jenis_publikasi' => 'required',
            'ts2' => 'required',
            'ts1'=> 'required',
            'ts'=> 'required',
            'jumlah'=> 'required'


        ]);

        $Publikasipamerandtps->update($request->all());

        return redirect()->route('Publikasipamerandtps.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publikasipamerandtps $Publikasipamerandtps)
    {
        $Publikasipamerandtps->delete();
        return redirect()->route('Publikasipamerandtps.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
