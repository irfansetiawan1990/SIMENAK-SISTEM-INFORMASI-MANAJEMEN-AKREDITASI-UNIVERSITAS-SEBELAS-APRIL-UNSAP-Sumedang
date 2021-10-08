<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pkmdtps;

class PkmdtpsController extends Controller
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
        $Pkmdtps = Pkmdtps::latest()->paginate(10);

        return view('Pkmdtps.index',compact('Pkmdtps'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pkmdtps.create');
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
        'jumlah'=> 'required'

        ]);

        Pkmdtps::create($request->all());
        return redirect()->route('Pkmdtps.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pkmdtps $Pkmdtps)
    {
        return view('Pkmdtps.show', compact('Pkmdtps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pkmdtps $Pkmdtps)
    {
        return view ('Pkmdtps.edit', compact('Pkmdtps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pkmdtps $Pkmdtps)
    {
        $required -> validate([
        'sumber_pembiayaan' => 'required',
        'ts2' => 'required',
        'ts1'=> 'required',
        'ts'=> 'required',
        'jumlah'=> 'required'

        ]);

        $Pkmdtps->update($request->all());

        return redirect()->route('Pkmdtps.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pkmdtps $Pkmdtps)
    {
        $Pkmdtps->delete();
        return redirect()->route('Pkmdtps.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
