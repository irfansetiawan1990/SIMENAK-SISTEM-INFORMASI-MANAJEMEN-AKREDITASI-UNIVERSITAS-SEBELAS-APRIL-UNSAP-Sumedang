<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas;

class FakultasController extends Controller
{
    public function __construct()
        {
            $this->middleware('auth');
        }

    public function index()
    {
        $Fakultas = Fakultas::all();
        return view('Fakultas.index',compact('Fakultas'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }
     
}
