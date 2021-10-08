<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penelitiandtps;

class PenelitiandtpsController extends Controller
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
        $Penelitiandtps = Penelitiandtps::latest()->paginate(10);

        return view('Penelitiandtps.index',compact('Penelitiandtps'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Penelitiandtps.create');
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
    
        'sumber_pembiayaan' => 'required',
        'ts2' => 'required',
        'ts1'=> 'required',
        'ts'=> 'required',
        'jumlah' => 'required'


        ]);

        Penelitiandtps::create($request->all());
        return redirect()->route('Penelitiandtps.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penelitiandtps $Penelitiandtps)
    {
        return view('Penelitiandtps.show', compact('Penelitiandtps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penelitiandtps $Penelitiandtps)
    {
        return view ('Penelitiandtps.edit', compact('Penelitiandtps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penelitiandtps $Penelitiandtps)
    {
        $request-> validate([
        'sumber_pembiayaan' => 'required',
        'ts2' => 'required',
        'ts1'=> 'required',
        'ts'=> 'required',
        'jumlah' => 'required'


        ]);

        $Penelitiandtps->update($request->all());

        return redirect()->route('Penelitiandtps.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penelitiandtps $Penelitiandtps)
    {
        $Penelitiandtps->delete();
        return redirect()->route('Penelitiandtps.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
