<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftarpsunipengelolaprodi;

class PengelolaprodiController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $d= Daftarpsunipengelolaprodi::latest()->paginate(10);

        return view('pengelolaprodi.index',compact('d'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('pengelolaprodi.create');
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
        return redirect()->route('pengelolaprodi.index')
                        ->with('berhasil','datadisimpan');
    }


    public function show($id)
    {
        $d=Daftarpsunipengelolaprodi::find($id);
        return view('pengelolaprodi.show', compact('d'));
    }

   
    public function edit($id)
    {
        $d=Daftarpsunipengelolaprodi::find($id);
        return view ('pengelolaprodi.edit', compact('d'));
    }

  
      public function update(Request $request, $id)
    {
        $request -> validate([

                'jenis_program' => 'required',
                'nama_ps' => 'required',
                'status' => 'required',
                'tgl_kadaluarsa'=> 'required',
                'jml_mhs_saat_ts' => 'required'

        ]);

       $d=Daftarpsunipengelolaprodi::find($id)->update($request->all());

        return redirect()->route('pengelolaprodi.index')
                        ->with('berhasil','data sudah datadisimpan');
    }




    public function destroy($id)
    {
        $d=Daftarpsunipengelolaprodi::find($id)->delete();
        return redirect()->route('pengelolaprodi.index')
                        ->with('berhasil','data sudah dihapus');
    }
}

