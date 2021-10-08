<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kepuasanpenggunalulusan;
class KepuasanpenggunalulusanController extends Controller
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
        $Kepuasanpenggunalulusan = Kepuasanpenggunalulusan::latest()->paginate(10);

        return view('Kepuasanpenggunalulusan.index',compact('Kepuasanpenggunalulusan'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kepuasanpenggunalulusan.create');
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
         
        'jenis_kemampuan' => 'required',
        'sangat_baik' => 'required',
        'baik'  => 'required',
        'cukup' => 'required',
        'kurang' => 'required',
        'rencana_tindak_lanjut_ps'  => 'required'

        ]);

        Kepuasanpenggunalulusan::create($request->all());
        return redirect()->route('Kepuasanpenggunalulusan.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kepuasanpenggunalulusan $Kepuasanpenggunalulusan)
    {
        return view('Kepuasanpenggunalulusan.show', compact('Kepuasanpenggunalulusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kepuasanpenggunalulusan $Kepuasanpenggunalulusan)
    {
        return view ('Kepuasanpenggunalulusan.edit', compact('Kepuasanpenggunalulusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kepuasanpenggunalulusan $Kepuasanpenggunalulusan)
    {
        $required -> validate([
         
        'jenis_kemampuan' => 'required',
        'sangat_baik' => 'required',
        'baik'  => 'required',
        'cukup' => 'required',
        'kurang' => 'required',
        'rencana_tindak_lanjut_ps'  => 'required'
        
        ]);

        $Kepuasanpenggunalulusan->update($request->all());

        return redirect()->route('Kepuasanpenggunalulusan.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kepuasanpenggunalulusan $Kepuasanpenggunalulusan)
    {
        $Kepuasanpenggunalulusan->delete();
        return redirect()->route('Kepuasanpenggunalulusan.index')
                        ->with('berhasil','data sudah dihapus');
    }
}