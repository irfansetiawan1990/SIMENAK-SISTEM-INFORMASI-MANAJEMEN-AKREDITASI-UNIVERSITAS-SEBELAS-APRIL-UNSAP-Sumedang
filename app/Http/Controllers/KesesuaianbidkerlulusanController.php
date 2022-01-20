<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kesesuaianbidkerlulusan;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class KesesuaianbidkerlulusanController extends Controller
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
             $Kesesuaianbidkerlulusan = DB::table('kesesuaian_bidang_kerja_lulusan')
            ->where('prodi_id','=',$id)
            ->get();


       }
               
       else{

        $Kesesuaianbidkerlulusan = Kesesuaianbidkerlulusan::simplepaginate(10);
       }
        
        $prodi = Prodi::all();
        return view('Kesesuaianbidkerlulusan.index',compact('Kesesuaianbidkerlulusan','id'))
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
        return view('Kesesuaianbidkerlulusan.create', compact('id'));
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
        'jml_lulusan' => 'required',
        'jml_terlacak' => 'required',
        'rendah' => 'required',
        'sedang' => 'required',
        'tinggi' => 'required',
        'prodi_id'
        ]);

        Kesesuaianbidkerlulusan::create($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Kesesuaianbidkerlulusan.index');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pkmdtpsmhs $Kesesuaianbidkerlulusan)
    {
        return view('Kesesuaianbidkerlulusan.show', compact('Kesesuaianbidkerlulusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pkmdtpsmhs $Kesesuaianbidkerlulusan)
    {
        return view ('Kesesuaianbidkerlulusan.edit', compact('Kesesuaianbidkerlulusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kbjl)
    {
        $request -> validate([
        'tahun_lulus',
        'jml_lulusan' => 'required',
        'jml_terlacak' => 'required',
        'rendah' => 'required',
        'sedang' => 'required',
        'tinggi' => 'required'

        ]);

        $Kesesuaianbidkerlulusan = Kesesuaianbidkerlulusan::find($id_kbjl)->update($request->all());
        Alert::success('Sukses', 'Data Berhasil Disimpan');
        return redirect()->route('Kesesuaianbidkerlulusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @retu
     rn \Illuminate\Http\Response
     */
     public function destroy($id_kbjl)
        {
            $Kesesuaianbidkerlulusan = Kesesuaianbidkerlulusan::find($id_kbjl)->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('Kesesuaianbidkerlulusan.index');               
        }
}

