<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }

    public function index()
    {
        $Prodi = DB::table('tb_prodi')->select()->get();
        return view('Prodi.index',compact('Prodi'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }
     
}
