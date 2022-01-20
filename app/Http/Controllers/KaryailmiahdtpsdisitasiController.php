<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyailmiahdtpsdisitasi;
use\App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;


class KaryailmiahdtpsdisitasiController extends Controller
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
     //   if (auth()->user()->level=="user"){

        $prodi = Prodi::all();
        $id = Auth::user()->prodi_id;

        $dosen = DB::table('dosen_tetap_pt')
                ->select('id','nama_dosen')
                ->get();
       // $Karyailmiahdtpsdisitasi = DB::table('karya_ilmiah_dtps_disitasi')
              //  ->where('prodi_id', '=', $id)
              //  ->get();      

     //   $countjudul = $Karyailmiahdtpsdisitasi->count('judul_artikel_disitasi');
     //   $sumsitasi = $Karyailmiahdtpsdisitasi->sum('jumlah_sitasi');       
     //   $Karyailmiahdtpsdisitasi = Karyailmiahdtpsdisitasi::latest()->paginate(10);
      //  return view('Karyailmiahdtpsdisitasi.index',compact('Karyailmiahdtpsdisitasi','id','dosen','c//ountjudul','sumsitasi'))
          //  ->with('i', (request()->input('page', 1) - 1) * 10);
     //       Alert::success('sukses','Data berhasil Disimpan');

      //  }
       
     //   elseif (auth()->user()->level=="admin") {
        
        $Karyailmiahdtpsdisitasi = Karyailmiahdtpsdisitasi::simplepaginate(10);
        $countjudul = $Karyailmiahdtpsdisitasi->count('judul_artikel_disitasi');
        $sumsitasi = $Karyailmiahdtpsdisitasi->sum('jumlah_sitasi');  
        return view('Karyailmiahdtpsdisitasi.index',compact('Karyailmiahdtpsdisitasi','dosen','countjudul','sumsitasi','prodi','id'))
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
            'jumlah_sitasi'=> 'required',
            'prodi_id'

        ]);

        Karyailmiahdtpsdisitasi::create($request->all());
        Alert::success('berhasil','datadisimpan');
        return redirect()->route('Karyailmiahdtpsdisitasi.index');
                        
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
    public function update(Request $request, $id_karya_ilmiah)
    {
        $request-> validate([
      
            'nama_dosen',
            'judul_artikel_disitasi' => 'required', 
            'jumlah_sitasi'=> 'required'



        ]);

        $Karyailmiahdtpsdisitasi = Karyailmiahdtpsdisitasi::find($id_karya_ilmiah)->update($request->all());
        Alert::success('berhasil','data sudah dirubah');
        return redirect()->route('Karyailmiahdtpsdisitasi.index');
                         
    }

    /**
     * Remove the specified resource from storage.
  
     */
    public function destroy($id_karya_ilmiah)
    {
        $Karyailmiahdtpsdisitasi = Karyailmiahdtpsdisitasi::find($id_karya_ilmiah)->delete();
         Alert::success('berhasil','data dihapus');
        return redirect()->route('Karyailmiahdtpsdisitasi.index');
                        
    }
}
