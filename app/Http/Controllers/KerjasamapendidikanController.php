<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerjasamapendidikan;

class KerjasamapendidikanController extends Controller
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
        $Kerjasamapendidikan = Kerjasamapendidikan::latest()->paginate(10);

        return view('Kerjasamapendidikan.index',compact('Kerjasamapendidikan'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kerjasamapendidikan.create');
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
           'lembaga_mitra' => 'required',
           'judul_kegiatan_kerja' => 'required',
           'tingkat' => 'required',
           'manfaat' => 'required',
           'waktu_durasi' => 'required',
           'bukti_kerjasama' => 'required',
           'tahun_berakhir_kjsm' => 'required'
        ]);

        Kerjasamapendidikan::create($request->all());
        return redirect()->route('Kerjasamapendidikan.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     \Illuminate\Http\Response
     */
    public function show($id_kerjasamapendidikan)
    {
        $Kerjasamapendidikan=Kerjasamapendidikan::find($id_kerjasamapendidikan);
        return view('Kerjasamapendidikan.show', compact('Kerjasamapendidikan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     \Illuminate\Http\Response
     */
    public function edit($id_kerjasamapendidikan)
    {
        $Kerjasamapendidikan=Kerjasamapendidikan::find($id_kerjasamapendidikan);
        return view ('Kerjasamapendidikan.edit', compact('Kerjasamapendidikan'));
    }

    /**
     * Update the specified resource in storage.
     *

     */
    public function update(Request $request, $id_kerjasamapendidikan)
    {
        $request -> validate([
           'lembaga_mitra' => 'required',
           'judul_kegiatan_kerja' => 'required',
           'tingkat' => 'required',
           'manfaat' => 'required',
           'waktu_durasi' => 'required',
           'bukti_kerjasama' => 'required',
           'tahun_berakhir_kjsm' => 'required'
        ]);

        $Kerjasamapendidikan=Kerjasamapendidikan::find($id_kerjasamapendidikan)->update($request->all());

        return redirect()->route('Kerjasamapendidikan.index')
                        ->with('berhasil','data sudah dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     \Illuminate\Http\Response
     */
    public function destroy($id_kerjasamapendidikan)
    {
        $Kerjasamapendidikan=Kerjasamapendidikan::find($id_kerjasamapendidikan)->delete();
        return redirect()->route('Kerjasamapendidikan.index')
                        ->with('berhasil','data sudah dihapus');
    }
}