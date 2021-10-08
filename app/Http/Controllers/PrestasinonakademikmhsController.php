<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasinonakademikmhs;

class PrestasinonakademikmhsController extends Controller
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
        $Prestasinonakademikmhs = Prestasinonakademikmhs::latest()->paginate(10);

        return view('Prestasinonakademikmhs.index',compact('Prestasinonakademikmhs'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        return view('Prestasinonakademikmhs.create');
    }

    
     
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

        Prestasinonakademikmhs::create($request->all());
        return redirect()->route('Prestasinonakademikmhs.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.

     */
    public function show(Prestasinonakademikmhs $Prestasinonakademikmhs)
    {
        return view('Prestasinonakademikmhs.show', compact('Prestasinonakademikmhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Prestasinonakademikmhs $Prestasinonakademikmhs)
    {
        return view ('Prestasinonakademikmhs.edit', compact('Prestasinonakademikmhs'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, Prestasinonakademikmhs $Prestasinonakademikmhs)
    {
        $required -> validate([
                'nama_kegiatan'=> 'required',
                'waktu_perolehan'=> 'required',
                'lokal'=> 'required',
                'nasional'=> 'required',
                'internasional'=> 'required',
                'prestasi'=> 'required'
        ]);

        $Prestasinonakademikmhs->update($request->all());

        return redirect()->route('Prestasinonakademikmhs.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

   
 
    public function destroy(Prestasinonakademikmhs $Prestasinonakademikmhs)
    {
        $Prestasinonakademikmhs->delete();
        return redirect()->route('Prestasinonakademikmhs.index')
                        ->with('berhasil','data sudah dihapus');
    }
}