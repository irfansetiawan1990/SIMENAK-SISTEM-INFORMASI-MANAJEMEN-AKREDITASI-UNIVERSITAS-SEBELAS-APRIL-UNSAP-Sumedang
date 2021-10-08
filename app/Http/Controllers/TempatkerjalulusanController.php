<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tempatkerjalulusan;

class TempatkerjalulusanController extends Controller
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
        $Tempatkerjalulusan = Tempatkerjalulusan::latest()->paginate(10);

        return view('Tempatkerjalulusan.index',compact('Tempatkerjalulusan'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tempatkerjalulusan.create');
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
         
        'tahun_lulus' => 'required',
    	'jml_lulusan'=> 'required',
    	'jml_lulusan_terlacak'=> 'required',
    	'lokal'=> 'required',
    	'nasional'=> 'required',
    	'internasional' => 'required'
        ]);

        Tempatkerjalulusan::create($request->all());
        return redirect()->route('Tempatkerjalulusan.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tempatkerjalulusan $Tempatkerjalulusan)
    {
        return view('Tempatkerjalulusan.show', compact('Tempatkerjalulusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tempatkerjalulusan $Tempatkerjalulusan)
    {
        return view ('Tempatkerjalulusan.edit', compact('Tempatkerjalulusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tempatkerjalulusan $Tempatkerjalulusan)
    {
        $required -> validate([
         
        'tahun_lulus' => 'required',
    	'jml_lulusan'=> 'required',
    	'jml_lulusan_terlacak'=> 'required',
    	'lokal'=> 'required',
    	'nasional'=> 'required',
    	'internasional' => 'required'
        ]);

        $Tempatkerjalulusan->update($request->all());

        return redirect()->route('Tempatkerjalulusan.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tempatkerjalulusan $Tempatkerjalulusan)
    {
        $Tempatkerjalulusan->delete();
        return redirect()->route('Tempatkerjalulusan.index')
                        ->with('berhasil','data sudah dihapus');
    }
}