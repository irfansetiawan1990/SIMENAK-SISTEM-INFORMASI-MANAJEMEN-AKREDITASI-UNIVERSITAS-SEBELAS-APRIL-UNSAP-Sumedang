<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ref8E2;

class Ref8E2Controller extends Controller
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
        $Ref8E2 = Ref8E2::latest()->paginate(10);

        return view('Ref8E2.index',compact('Ref8E2'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Ref8E2.create');
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
         
        'tahun_lulus'=> 'required',
	   	'jumlah_lulusan'=> 'required',
	   	'jumlah_tanggapan'=> 'required'

        ]);

        Ref8E2::create($request->all());
        return redirect()->route('Ref8E2.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ref8E2 $Ref8E2)
    {
        return view('Ref8E2.show', compact('Ref8E2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ref8E2 $Ref8E2)
    {
        return view ('Ref8E2.edit', compact('Ref8E2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ref8E2 $Ref8E2)
    {
        $required -> validate([
         
        'tahun_lulus'=> 'required',
	   	'jumlah_lulusan'=> 'required',
	   	'jumlah_tanggapan'=> 'required'
	   	
        ]);

        $Ref8E2->update($request->all());

        return redirect()->route('Ref8E2.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ref8E2 $Ref8E2)
    {
        $Ref8E2->delete();
        return redirect()->route('Ref8E2.index')
                        ->with('berhasil','data sudah dihapus');
    }
}