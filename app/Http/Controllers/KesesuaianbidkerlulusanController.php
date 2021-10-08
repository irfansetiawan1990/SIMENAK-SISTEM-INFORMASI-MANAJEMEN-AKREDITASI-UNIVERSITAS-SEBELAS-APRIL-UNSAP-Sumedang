<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kesesuaianbidkerlulusan;

class KesesuaianbidkerlulusanController extends Controller
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
        $Kesesuaianbidkerlulusan = Kesesuaianbidkerlulusan::latest()->paginate(10);

        return view('Kesesuaianbidkerlulusan.index',compact('Kesesuaianbidkerlulusan'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        return view('Kesesuaianbidkerlulusan.create');
    }

    
     
    public function store(Request $request)
    {
        $request->validate([

        'tahun_lulus' => 'required',
        'jml_lulusan' => 'required',
        'jml_lulusan_terlacak' => 'required',
        'jml_lulusan_terlacak_rendah' => 'required',
        'jml_lulusan_terlacak_sedang' => 'required',
        'jml_lulusan_terlacak_tinggi'=> 'required',

     
        ]);

        Kesesuaianbidkerlulusan::create($request->all());
        return redirect()->route('Kesesuaianbidkerlulusan.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.

     */
    public function show(Kesesuaianbidkerlulusan $Kesesuaianbidkerlulusan)
    {
        return view('Kesesuaianbidkerlulusan.show', compact('Kesesuaianbidkerlulusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Kesesuaianbidkerlulusan $Kesesuaianbidkerlulusan)
    {
        return view ('Kesesuaianbidkerlulusan.edit', compact('Kesesuaianbidkerlulusan'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, Kesesuaianbidkerlulusan $Kesesuaianbidkerlulusan)
    {
        $required -> validate([

        'tahun_lulus' => 'required',
        'jml_lulusan' => 'required',
        'jml_lulusan_terlacak' => 'required',
        'jml_lulusan_terlacak_rendah' => 'required',
        'jml_lulusan_terlacak_sedang' => 'required',
        'jml_lulusan_terlacak_tinggi'=> 'required',

        ]);

        $Kesesuaianbidkerlulusan->update($request->all());

        return redirect()->route('Kesesuaianbidkerlulusan.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

   
 
    public function destroy(Kesesuaianbidkerlulusan $Kesesuaianbidkerlulusan)
    {
        $Kesesuaianbidkerlulusan->delete();
        return redirect()->route('Kesesuaianbidkerlulusan.index')
                        ->with('berhasil','data sudah dihapus');
    }
}