<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use DB;// For make transaction or process
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Input; 
use Session;

class LoginController extends Controller
{
  
    public function login()
    {
        return view('login');
    }

    public function loginConfirm()
    {
        return view('loginConfirm');
    }
    
     public function loginConfirm2()
    {
    	 $lastName  = Input::get('lastName') ;
        // return view('welcome');
    }

 //    public function sessionBookId($id)
	// {
	// 	session()->put('edit_book_id', $id );
	// 	return redirect('editBookShow');
	// }

}
