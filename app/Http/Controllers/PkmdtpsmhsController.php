<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pkmdtpsmhs;

class PkmdtpsmhsController extends Controller
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
        $Pkmdtpsmhs = Pkmdtpsmhs::latest()->paginate(10);

        return view('Pkmdtpsmhs.index',compact('Pkmdtpsmhs'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pkmdtpsmhs.create');
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
        
        'nama_dosen'=> 'required',
        'tema_pkm_roadmap'=> 'required',
        'nama_mhs'=> 'required',
        'judul_kegiatan'=> 'required',
        'tahun' => 'required'

        ]);

        Pkmdtpsmhs::create($request->all());
        return redirect()->route('Pkmdtpsmhs.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pkmdtpsmhs $Pkmdtpsmhs)
    {
        return view('Pkmdtpsmhs.show', compact('Pkmdtpsmhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pkmdtpsmhs $Pkmdtpsmhs)
    {
        return view ('Pkmdtpsmhs.edit', compact('Pkmdtpsmhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pkmdtpsmhs $Pkmdtpsmhs)
    {
        $required -> validate([
    
        'nama_dosen'=> 'required',
        'tema_pkm_roadmap'=> 'required',
        'nama_mhs'=> 'required',
        'judul_kegiatan'=> 'required',
        'tahun' => 'required'


        ]);

        $Pkmdtpsmhs->update($request->all());

        return redirect()->route('Pkmdtpsmhs.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pkmdtpsmhs $Pkmdtpsmhs)
    {
        $Pkmdtpsmhs->delete();
        return redirect()->route('Pkmdtpsmhs.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
