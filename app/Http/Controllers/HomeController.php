<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Prodi;

use App\Models\Dosentetappt;
use App\Models\Dosentdktetap;
use App\Models\Fakultas;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
 
        $fakultas = Auth::user()->fakul_id ;
        $data_fakul = DB::table('tb_fakultas')
                ->join('users', 'fakul_id', '=', 'tb_fakultas.id_fakultas')
                ->select('users.*', 'tb_fakultas.nama_fak')
                ->where('users.fakul_id', '=', $fakultas)
                ->get();
        $dosentetap = Dosentetappt::count();
        $dosentdktetap = Dosentdktetap::count();
        $prodi = Prodi::all();
        $user = Auth::user()->name;

        //PERHITUNGAN CAPAIAN NILAI DOSEN
        $Dosentetappt = Dosentetappt::ALL();

        $nilai = $Dosentetappt->count('nama_dosen');

        return view('home', compact('user','prodi','dosentetap','dosentdktetap','data_fakul','nilai'));

        //dd($data);
    }



 


}