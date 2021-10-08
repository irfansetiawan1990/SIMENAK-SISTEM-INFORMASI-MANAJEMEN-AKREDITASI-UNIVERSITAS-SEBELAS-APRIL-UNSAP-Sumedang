<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasiakademikmhs;

class PrestasiakademikmhsController extends Controller
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
        $Prestasiakademikmhs = Prestasiakademikmhs::latest()->paginate(10);

        return view('Prestasiakademikmhs.index',compact('Prestasiakademikmhs'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        return view('Prestasiakademikmhs.create');
    }

    
     */
    public function store(Request $request)
    {
        $request->validate([
                'nama_kegiatan'=> 'required',
                'waktu_perolehan'=> 'required',
                'lokal'=> 'required',
                'nasional'=> 'required',
                'internasional'=> 'required',
                'prestasi'=> 'required'

     
        ]);

        Prestasiakademikmhs::create($request->all());
        return redirect()->route('Prestasiakademikmhs.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.

     */
    public function show(Prestasiakademikmhs $Prestasiakademikmhs)
    {
        return view('Prestasiakademikmhs.show', compact('Prestasiakademikmhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Prestasiakademikmhs $Prestasiakademikmhs)
    {
        return view ('Prestasiakademikmhs.edit', compact('Prestasiakademikmhs'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, Prestasiakademikmhs $Prestasiakademikmhs)
    {
        $required -> validate([
                'nama_kegiatan'=> 'required',
                'waktu_perolehan'=> 'required',
                'lokal'=> 'required',
                'nasional'=> 'required',
                'internasional'=> 'required',
                'prestasi'=> 'required'
        ]);

        $Prestasiakademikmhs->update($request->all());

        return redirect()->route('Prestasiakademikmhs.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

   
 
    public function destroy(Prestasiakademikmhs $Prestasiakademikmhs)
    {
        $Prestasiakademikmhs->delete();
        return redirect()->route('Prestasiakademikmhs.index')
                        ->with('berhasil','data sudah dihapus');
    }
}