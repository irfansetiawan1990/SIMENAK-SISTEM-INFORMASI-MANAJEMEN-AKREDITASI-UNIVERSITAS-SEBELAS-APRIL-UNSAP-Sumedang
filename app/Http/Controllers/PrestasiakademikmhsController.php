<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasiakademikmhs;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class PrestasiakademikmhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       $id = Auth::user()->prodi_id;

       if (auth()->user()->level=="user"){
             $Prestasiakademikmhs = DB::table('prestasi_akademik_mhs')
            ->where('prodi_id','=',$id)
            ->get();


       }
               
       else{

        $Prestasiakademikmhs = Prestasiakademikmhs::simplepaginate(10);
       }
        
        $prodi = Prodi::all();
        $count_t1 = DB::table('prestasi_akademik_mhs')->count('lokal');
        $count_t2 = DB::table('prestasi_akademik_mhs')->count('nasional');
        $count_t3 = DB::table('prestasi_akademik_mhs')->count('internasional');
        return view('Prestasiakademikmhs.index',compact('Prestasiakademikmhs','id','count_t1','count_t2','count_t3'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->prodi_id;
        return view('Prestasiakademikmhs.create', compact('id'));
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
        
        'nama_kegiatan' => 'required',
        'tahun_perolehan' => 'required',
        'lokal',
        'nasional',
        'internasional',
        'prestasi_yg_dicapai' => 'required',
        'prodi_id' => 'required' 
   

        ]);

        Prestasiakademikmhs::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Prestasiakademikmhs.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pkmdtpsmhs $Prestasiakademikmhs)
    {
        return view('Prestasiakademikmhs.show', compact('Prestasiakademikmhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pkmdtpsmhs $Prestasiakademikmhs)
    {
        return view ('Prestasiakademikmhs.edit', compact('Prestasiakademikmhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_prestasi_akademik_mhs)
    {
        $request -> validate([
        'nama_kegiatan' => 'required',
        'tahun_perolehan' => 'required',
        'lokal',
        'nasional',
        'internasional',
        'prestasi_yg_dicapai' => 'required'

   
        ]);

        $Prestasiakademikmhs = Prestasiakademikmhs::find($id_prestasi_akademik_mhs)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Prestasiakademikmhs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @retu
     rn \Illuminate\Http\Response
     */
     public function destroy($id_prestasi_akademik_mhs)
        {
            $Prestasiakademikmhs = Prestasiakademikmhs::find($id_prestasi_akademik_mhs)->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('Prestasiakademikmhs.index');
                  
        }
}

