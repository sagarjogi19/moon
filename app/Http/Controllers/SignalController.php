<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignalController extends Controller
{
   public function __construct()
    {
        $this->middleware('guest:front');
    }
    
     public function index()
    {
        return view('signal');
    }
}
