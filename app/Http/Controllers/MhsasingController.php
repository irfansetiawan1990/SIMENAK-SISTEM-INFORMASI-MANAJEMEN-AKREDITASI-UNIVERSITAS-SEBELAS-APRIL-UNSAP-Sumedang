<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mhsasing;

class MhsasingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.8
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Mhsasing = Mhsasing::latest()->paginate(10);

        return view('Mhsasing.index',compact('Mhsasing'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Mhsasing.create');
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
           'ps_program_studi' => 'required',
           'ts2' => 'required',
           'ts1' => 'required',
           'ts' => 'required',
           'ts2_1' => 'required',
           'ts1_1' => 'required',
           'ts_1' => 'required',
           'ts2_2' => 'required',
           'ts1_2' => 'required',
           'ts_2' => 'required',

     
        ]);

        Mhsasing::create($request->all());
        return redirect()->route('Mhsasing.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_mhs_asing)
    {
        return view('Mhsasing.show', compact('Mhsasing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_mhs_asing)
    {
        return view ('Mhsasing.edit', compact('Mhsasing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_mhs_asing)
    {
        $request -> validate([
           'ps_program_studi' => 'required',
           'ts2' => 'required',
           'ts1' => 'required',
           'ts' => 'required',
           'full_ts2' => 'required',
           'full_ts1' => 'required',
           'full_ts' => 'required',
           'part_ts2' => 'required',
           'part_ts1' => 'required',
           'part_ts' => 'required'
        ]);

        $Mhsasing=Mhsasing::find($id_mhs_asing)->update($request->all());

        return redirect()->route('Mhsasing.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_mhs_asing)
    {
        $Mhsasing=Mhsasing::find($id_mhs_asing)->delete();
        return redirect()->route('Mhsasing.index')
                        ->with('berhasil','data sudah dihapus');
    }
}