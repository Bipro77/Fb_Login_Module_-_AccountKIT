<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  
    public function index()
    {
        return view('homepage');
    }
    
      public function welcome()
    {
        return view('welcome');
    }
}
