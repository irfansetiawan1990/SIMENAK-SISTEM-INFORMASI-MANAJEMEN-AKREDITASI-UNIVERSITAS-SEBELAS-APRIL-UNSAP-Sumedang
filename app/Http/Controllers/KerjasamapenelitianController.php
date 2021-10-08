<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerjasamapenelitian;

class KerjasamapenelitianController extends Controller
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
        $kjspkm = Kerjasamapenelitian::latest()->paginate(10);

        return view('Kerjasamapenelitian.index',compact('kjspkm'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kerjasamapenelitian.create');
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
            'tingkat'=> 'required',
            'judul_kegiatan_kerja'=> 'required',
            'manfaat'=> 'required',
            'waktu_durasi'=> 'required',
            'bukti_kerjasama'=> 'required',
            'tahun_berakhir_kjsm' => 'required'
        ]);

        Kerjasamapenelitian::create($request->all());
        return redirect()->route('Kerjasamapenelitian.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kjpl)
    {
        return view('Kerjasamapenelitian.show', compact('kjspkm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kjpl)
    {
        return view ('Kerjasamapenelitian.edit', compact('kjspkm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kjpl)
    {
        $request -> validate([
               'lembaga_mitra' => 'required',
            'tingkat'=> 'required',
            'judul_kegiatan_kerja'=> 'required',
            'manfaat'=> 'required',
            'waktu_durasi'=> 'required',
            'bukti_kerjasama'=> 'required',
            'tahun_berakhir_kjsm' => 'required'
        ]);

        $kjspkm=Kerjasamapenelitian::find($id_kjpl)->update($request->all());

        return redirect()->route('Kerjasamapenelitian.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kjpl)
    {
        $kjspkm=Kerjasamapenelitian::find($id_kjpl)->delete();
        return redirect()->route('Kerjasamapenelitian.index')
                        ->with('berhasil','data sudah dihapus');
    }
}