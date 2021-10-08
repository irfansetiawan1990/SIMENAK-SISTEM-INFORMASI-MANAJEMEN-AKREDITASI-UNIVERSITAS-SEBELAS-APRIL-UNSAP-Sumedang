<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosenpembimbingutamatugasakhir;

class DosbingtaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.

     */
    public function index()
    {
        $dosenpembimbing= Dosenpembimbingutamatugasakhir::latest()->paginate(10);

        return view('Dosbingta.index',compact('dosenpembimbing'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dosbingta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
      \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dosen'=> 'required',
            'ts2' => 'required',
            'ts1' => 'required',
            'ts' => 'required',
            'r1' => 'required',
            'ts_2'=> 'required',
            'ts_1' => 'required',
            'ts_' => 'required',
            'r2' => 'required',
            'r3' => 'required'

        ]);

        Dosenpembimbingutamatugasakhir::create($request->all());
        return redirect()->route('Dosbingta.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
    \Illuminate\Http\Response
     */
    public function show(Dosenpembimbingutamatugasakhir $dosenpembimbing)
    {

        return view('Dosbingta.show', compact('dosenpembimbing'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id_dosen_pembimbing)
    {
        return view ('Dosbingta.edit', compact('dosenpembimbing'));
    }

    /**
     * Update the specified resource in storage.
     *
  
     */
    public function update(Request $request, $id_dosen_pembimbing)
    {
        $request -> validate([
            'nama_dosen'=> 'required',
            'ts2' => 'required',
            'ts1' => 'required',
            'ts' => 'required',
            'r1' => 'required',
            'ts_2'=> 'required',
            'ts_1' => 'required',
            'ts_' => 'required',
            'r2' => 'required',
            'r3' => 'required'

        ]);

        $dosenpembimbing= Dosenpembimbingutamatugasakhir::find($id_dosen_pembimbing)->update($request->all());

        return redirect()->route('Dosbingta.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
    \Illuminate\Http\Response
     */
    public function destroy($id_dosen_pembimbing)
    {
    
        $dosenpembimbing = Dosenpembimbingutamatugasakhir::find($id_dosen_pembimbing)->delete();
        return redirect()->route('Dosbingta.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
