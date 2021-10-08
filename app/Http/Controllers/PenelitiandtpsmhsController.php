<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penelitiandtpsmhs;

class PenelitiandtpsmhsController extends Controller
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
        $Penelitiandtpsmhs = Penelitiandtpsmhs::latest()->paginate(10);

        return view('Penelitiandtpsmhs.index',compact('Penelitiandtpsmhs'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Penelitiandtpsmhs.create');
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
        
        'nama_dosen' => 'required',
        'tema_roadmap'=> 'required',
        'judul_kegiatan'=> 'required',
        'tahun' => 'required'

        ]);

        Penelitiandtpsmhs::create($request->all());
        return redirect()->route('Penelitiandtpsmhs.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penelitiandtpsmhs $Penelitiandtpsmhs)
    {
        return view('Penelitiandtpsmhs.show', compact('Penelitiandtpsmhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penelitiandtpsmhs $Penelitiandtpsmhs)
    {
        return view ('Penelitiandtpsmhs.edit', compact('Penelitiandtpsmhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penelitiandtpsmhs $Penelitiandtpsmhs)
    {
        $required -> validate([
    
        'nama_dosen' => 'required',
        'tema_roadmap'=> 'required',
        'judul_kegiatan'=> 'required',
        'tahun' => 'required'

        ]);

        $Penelitiandtpsmhs->update($request->all());

        return redirect()->route('Penelitiandtpsmhs.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penelitiandtpsmhs $Penelitiandtpsmhs)
    {
        $Penelitiandtpsmhs->delete();
        return redirect()->route('Penelitiandtpsmhs.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
