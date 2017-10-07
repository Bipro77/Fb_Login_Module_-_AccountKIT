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

    public function fbLogin1()
    {  
        return view('loginConfirm');
    }
    

    // session(['name' => 'null']);
     public function fbLogin2(Request $request)
    {
            
    	$name=$request->input('name');
    	$email=$request->input('email');
    	$id=$request->input('id');
    	// $user_mail = DB::table('users')
     //            ->where('fb_id', '>=', $id)
     //            ->pluck('email');
    	$result1 = DB::select("SELECT email FROM users WHERE email = '$email'");
			$user_mail = '';
			foreach ($result1 as $data){
  				$user_mail = $data->email;
			}

        session(['name' => $name]);

        if($user_mail == $email){
        	return view('welcome', ['name' => $name,'email' => $email, 'type' => 'FB']);
        } else {
        	DB::table('users')->insert(  ['email' => $email,'name' => $name, 'fb_id' => $id]);
        	return view('welcome', ['name' => $name,'email' => $email, 'type' => 'FB']);
        }

    	// DB::table('users')->insert(  ['email' => $email, 'fb_id' => $id]);
    	// var_dump($email);
    	// var_dump($user);
    	
    }

     public function emailLogin(Request $request)
    {
            
    	$post = $request->all();
		// var_dump($post);
		$v   = \Validator::make($request->all(),
			[
			'email'  => 'required',
			// 'password'  => 'required',
			]);
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		} 
		else 
		{
			$email = $post['email'];
			$result1 = DB::select("SELECT password FROM users WHERE email = '$email'");
			$pwd = '';
			foreach ($result1 as $data){
  				$pwd = $data->password;
			}
			if ($post['password'] == $pwd) {
			$result2 = DB::select("SELECT name FROM users WHERE email = '$email'");
			// session(['name2' => $name]);			
			 // $name2 = session('name');
			 // var_dump($value);
			$name = '';
			foreach ($result2 as $data){
  				$name = $data->name;
			}
			session(['name' => $name]);
				return view('welcome', ['name' => $name ,'email' => $email , 'type' => 'email']);
			
			
			} else {
				// var_dump(expression);
				Session::flash('message','Incorrect password or email');
				return redirect('\login');

			}

			// if($j > 0)
			// {
			// 	// Session::flash('message','Successfully Inserted');
			// 	// return redirect('bookTable');
			// }
		}
    }
 	
 	 public function logout(Request $request)
    { 	
    	$request->session()->flush();
    	Session::flash('message','Successfully Logged Out');
       return redirect('login');
    }



    public function emailRegisterView(){
    	return view('emailRegisterView');
    }


     public function emailRegister(Request $request)    
    { 	
    	
        $post = $request->all();
		// var_dump($post);
		$v   = \Validator::make($request->all(),
			[
			'email'  => 'required',
			'password'  => 'required',
			'name'  => 'required',
			// 'phone'  => 'required',
			]);
		if($v->fails())
		{
			return redirect()->back()->withErrors($v->errors());
		} 
		else 
		{
			$email  = $post['email'];
			$name = $post['name'];
			$pwd = $post['password'];

			$j = DB::table('users')->insert(  ['email' => $email,'name' => $name, 'password' => $pwd]);

			if ($j > 0 ) {
			Session::flash('message',' Registration Successfull, Please Login to Continue+');
			return redirect('\login');

			} else {
				// var_dump(expression);
				// Session::flash('message','Incorrect password or email');
				return redirect('\login');

			}
		}
		//
    }

    public function accountKit()
    { 	    	
        return view('accountKit');
    }

    public function accountKitWelcome()
    { 	    	
        return view('accountKitWelcome');
    }

}
