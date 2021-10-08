<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerjasamapkm;

class KerjasamapkmController extends Controller
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
        $Kerjasamapkm = Kerjasamapkm::latest()->paginate(10);

        return view('Kerjasamapkm.index',compact('Kerjasamapkm'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kerjasamapkm.create');
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
           'tahun_berakhir_kjs_pkm' => 'required'
        ]);

        Kerjasamapkm::create($request->all());
        return redirect()->route('Kerjasamapkm.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kjspkm)
    {
        $Kerjasamapkm=Kerjasamapkm::find($id_kjspkm);
        return view('Kerjasamapkm.show', compact('Kerjasamapkm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kjspkm)
    {
        $Kerjasamapkm=Kerjasamapkm::find($id_kjspkm);
        return view ('Kerjasamapkm.edit', compact('Kerjasamapkm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kjspkm)
    {
        $request -> validate([
           'lembaga_mitra' => 'required',
           'judul_kegiatan_kerja' => 'required',
           'tingkat' => 'required',
           'manfaat' => 'required',
           'waktu_durasi' => 'required',
           'bukti_kerjasama' => 'required',
           'tahun_berakhir_kjs_pkm' => 'required'
        ]);

        $Kerjasamapkm=Kerjasamapkm::find($id_kjspkm)->update($request->all());

        return redirect()->route('Kerjasamapkm.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kjspkm)
    {
        $Kerjasamapkm=Kerjasamapkm::find($id_kjspkm)->delete();
        return redirect()->route('Kerjasamapkm.index')
                        ->with('berhasil','data sudah dihapus');
    }
}