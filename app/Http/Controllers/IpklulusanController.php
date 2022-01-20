<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ipklulusan;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class IpklulusanController extends Controller
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
             $Ipklulusan = DB::table('ipk_lulusan')
            ->where('ipk_lulusan.prodi_id','=',$id)
            ->get();


       }
               
       else{

        $Ipklulusan = Ipklulusan::simplepaginate(10);
       }
        
        $prodi = Prodi::all();
        return view('Ipklulusan.index',compact('Ipklulusan','id'))
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
        return view('Ipklulusan.create', compact('id'));
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
        
        'tahun_lulus' => 'required|unique:ipk_lulusan|max:4',
        'jml_lulusan' => 'required',
        'minimal' => 'required',
        'rata_rata' => 'required',
        'maks' => 'required',
        'prodi_id'  
   

        ]);

        Ipklulusan::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Ipklulusan.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pkmdtpsmhs $Ipklulusan)
    {
        return view('Ipklulusan.show', compact('Ipklulusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pkmdtpsmhs $Ipklulusan)
    {
        return view ('Ipklulusan.edit', compact('Ipklulusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ipk_lulusan)
    {
        $request -> validate([
        'tahun_lulus' => 'required',
        'jml_lulusan' => 'required',
        'minimal' => 'required',
        'rata_rata' => 'required',
        'maks' => 'required',
        ]);

        $Ipklulusan = Ipklulusan::find($id_ipk_lulusan)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Ipklulusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @retu
     rn \Illuminate\Http\Response
     */
     public function destroy($id_ipk_lulusan)
        {
            $Ipklulusan = Ipklulusan::find($id_ipk_lulusan)->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('Ipklulusan.index');
                  
        }
}

