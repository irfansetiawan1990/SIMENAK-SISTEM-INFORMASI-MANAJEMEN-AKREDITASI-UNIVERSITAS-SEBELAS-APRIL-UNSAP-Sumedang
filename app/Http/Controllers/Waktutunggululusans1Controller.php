<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waktutunggululusans1;

class Waktutunggululusans1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.8
     *

     */
    public function index()
    {
        $Waktutunggululusans1 = Waktutunggululusans1::latest()->paginate(10);

        return view('Waktutunggululusans1.index',compact('Waktutunggululusans1'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        return view('Waktutunggululusans1.create');
    }

    
     
    public function store(Request $request)
    {
        $request->validate([

        'tahun_lulus' => 'required',
        'jml_lulusan' => 'required',
        'jml_terlacak' => 'required',
        'wt1' => 'required',
        'wt2'=> 'required',
        'wt3'=> 'required'

     
        ]);

        Waktutunggululusans1::create($request->all());
        return redirect()->route('Waktutunggululusans1.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.

     */
    public function show(Waktutunggululusans1 $Waktutunggululusans1)
    {
        return view('Waktutunggululusans1.show', compact('Waktutunggululusans1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Waktutunggululusans1 $Waktutunggululusans1)
    {
        return view ('Waktutunggululusans1.edit', compact('Waktutunggululusans1'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, Waktutunggululusans1 $Waktutunggululusans1)
    {
        $required -> validate([
        'tahun_lulus' => 'required',
        'jml_lulusan' => 'required',
        'jml_terlacak' => 'required',
        'wt1' => 'required',
        'wt2'=> 'required',
        'wt3'=> 'required'
        ]);

        $Waktutunggululusans1->update($request->all());

        return redirect()->route('Waktutunggululusans1.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

   
 
    public function destroy(Waktutunggululusans1 $Waktutunggululusans1)
    {
        $Waktutunggululusans1->delete();
        return redirect()->route('Waktutunggululusans1.index')
                        ->with('berhasil','data sudah dihapus');
    }
}