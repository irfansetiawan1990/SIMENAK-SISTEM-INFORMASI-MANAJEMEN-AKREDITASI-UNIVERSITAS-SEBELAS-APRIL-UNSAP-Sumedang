<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Identitas;

class IdentitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function index()
    {
        return view('identitas.index');
            
    }

    
}
