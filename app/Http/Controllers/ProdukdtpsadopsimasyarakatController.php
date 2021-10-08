<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkdtpsadopsimasyarakat;

class ProdukdtpsadopsimasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $Produkdtpsadopsimasyarakat = Produkdtpsadopsimasyarakat::latest()->paginate(10);

        return view('Produkdtpsadopsimasyarakat.index',compact('Produkdtpsadopsimasyarakat'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Produkdtpsadopsimasyarakat.create');
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
            'nama_produk'=> 'required',
            'deskripsi_produk'=> 'required',
            'bukti'=> 'required',
            'tahun'=> 'required'
        ]);

        Produkdtpsadopsimasyarakat::create($request->all());
        return redirect()->route('Produkdtpsadopsimasyarakat.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produkdtpsadopsimasyarakat $Produkdtpsadopsimasyarakat)
    {
        return view('Produkdtpsadopsimasyarakat.show', compact('Produkdtpsadopsimasyarakat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produkdtpsadopsimasyarakat $Produkdtpsadopsimasyarakat)
    {
        return view ('Produkdtpsadopsimasyarakat.edit', compact('Produkdtpsadopsimasyarakat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produkdtpsadopsimasyarakat $Produkdtpsadopsimasyarakat)
    {
        $request-> validate([
            'nama_dosen' => 'required',
            'nama_produk'=> 'required',
            'deskripsi_produk'=> 'required',
            'bukti'=> 'required',
            'tahun'=> 'required'


        ]);

        $Produkdtpsadopsimasyarakat->update($request->all());

        return redirect()->route('Produkdtpsadopsimasyarakat.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produkdtpsadopsimasyarakat $Produkdtpsadopsimasyarakat)
    {
        $Produkdtpsadopsimasyarakat->delete();
        return redirect()->route('Produkdtpsadopsimasyarakat.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
