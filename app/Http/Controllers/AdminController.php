<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Traits\UserTrait;
use Response;
use Auth;

use App\Models\User;
use App\Models\Category;
use App\Models\Cms;
class AdminController extends Controller
{


    private $request;
    protected $user;


    function __construct(Request $request){
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminLogin(){
		$User = new User;
		$data['user'] = $User;
        return view('admin.Users.admin_login', $data);
    }
	
	function post_login(Request $request){
		$data = $request->input();
		$validator =  Validator::make($data, [
            'email' => 'required|max:255',
            'password' => 'required',
        ]);
		if ($validator->fails()) {
				return redirect('/admin/users/login')
                        ->withErrors($validator)
						->with('error','Incorrect email or password.')
                        ->withInput();
		}
		$user = User::where('email',$request->email)
            ->first();
		//dd($user);
		if(!empty($user)){
			$userdata = array(
				'email'     => $request->email,
				'password'  => $request->password,
			);
			if(Auth::guard()->attempt($userdata)) {
				return redirect('/admin/users/dashboard');
			}else{
				return redirect('/admin/users/login')->with('error','Incorrect email or password.');
			}
		}else{
			return redirect('/admin/users/login')->with('error','Incorrect email or password.');
		}
	}

	function dashboard(){
		$data = array();
        return view('admin.dashboard', $data);
	}

	function logout(){
		Auth::logout(); // log the user out of our application
		return Redirect('/admin/users/login');
	}

}

