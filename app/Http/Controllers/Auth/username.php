<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosenpembimbingutamatugasakhir;

class DosbingtaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.

     */
    public function index()
    {
        $dosenpembimbing= Dosenpembimbingutamatugasakhir::latest()->paginate(10);

        return view('Dosbingta.index',compact('dosenpembimbing'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**

}
