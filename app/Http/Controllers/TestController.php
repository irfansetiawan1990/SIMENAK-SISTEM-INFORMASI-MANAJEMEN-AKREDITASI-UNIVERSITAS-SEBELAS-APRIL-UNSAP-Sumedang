<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftarpsunipengelolaprodi;

class DaftarpsunipengelolaprodiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $d= Daftarpsunipengelolaprodi::latest()->paginate(10);

        return view('Daftarpsunipengelolaprodi.index',compact('d'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('Daftarpsunipengelolaprodi.create');
    }


    public function store(Request $request)
    {
        $request->validate([
      
       			'jenis_program' => 'required',
		        'nama_ps' => 'required',
		        'status' => 'required',
		        'tgl_kadaluarsa'=> 'required',
		        'jml_mhs_saat_ts' => 'required'

        ]);

        Daftarpsunipengelolaprodi::create($request->all());
        return redirect()->route('daftarpengelolaprodi.index')
                        ->with('berhasil','datadisimpan');
    }


    public function show(Daftarpsunipengelolaprodi $d)
    {
        return view('daftarpsunipengelolaprodi.show', compact('d'));
    }

   
    public function edit(Daftarpsunipengelolaprodi $d)
    {
        return view ('daftarpsunipengelolaprodi.edit', compact('d'));
    }

  
    public function update(Request $request, Daftarpsunipengelolaprodi $d)
    {
        $request -> validate([
                'jenis_program' => 'required',
		        'nama_ps' => 'required',
		        'status' => 'required',
		        'tgl_kadaluarsa'=> 'required',
		        'jml_mhs_saat_ts' => 'required'

        ]);

        $d->update($request->all());

        return redirect()->route('daftarpsunipengelolaprodi.index')
                        ->with('berhasil','data sudah datadisimpan');
    }


    public function destroy(Daftarpsunipengelolaprodi $d)
    {
        $d->delete();
        return redirect()->route('daftarpsunipengelolaprodi.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
