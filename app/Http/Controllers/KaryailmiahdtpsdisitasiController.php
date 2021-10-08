<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyailmiahdtpsdisitasi;

class KaryadtpsdisitasiController extends Controller
{
    /**
     * Display a listing of the resource.
    
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $Karyailmiahdtpsdisitasi = Karyailmiahdtpsdisitasi::latest()->paginate(10);

        return view('Karyailmiahdtpsdisitasi.index',compact('Karyailmiahdtpsdisitasi'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
    
     */
    public function create()
    {
        return view('Karyailmiahdtpsdisitasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
   
     */
    public function store(Request $request)
    {
        $request->validate([
        
            'nama_dosen'=> 'required', 
            'judul_artikel_disitasi' => 'required', 
            'jumlah_sitasi'=> 'required'

        ]);

        Karyailmiahdtpsdisitasi::create($request->all());
        return redirect()->route('Karyailmiahdtpsdisitasi.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
 
     */
    public function show(Karyailmiahdtpsdisitasi $Karyailmiahdtpsdisitasi)
    {
        return view('Karyailmiahdtpsdisitasi.show', compact('Karyailmiahdtpsdisitasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     
     */
    public function edit(Karyailmiahdtpsdisitasi $Karyailmiahdtpsdisitasi)
    {
        return view ('Karyailmiahdtpsdisitasi.edit', compact('Karyailmiahdtpsdisitasi'));
    }

    /**
     * Update the specified resource in storage.
   
     */
    public function update(Request $request, Karyailmiahdtpsdisitasi $Karyailmiahdtpsdisitasi)
    {
        $request-> validate([
      
            'nama_dosen'=> 'required', 
            'judul_artikel_disitasi' => 'required', 
            'jumlah_sitasi'=> 'required'


        ]);

        $Karyailmiahdtpsdisitasi->update($request->all());

        return redirect()->route('Karyailmiahdtpsdisitasi.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
  
     */
    public function destroy(Karyailmiahdtpsdisitasi $Karyailmiahdtpsdisitasi)
    {
        $Karyailmiahdtpsdisitasi->delete();
        return redirect()->route('Karyailmiahdtpsdisitasi.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
