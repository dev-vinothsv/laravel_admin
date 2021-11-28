<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\AssignedRoles as IsAdminRoles;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        #$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	
    	if(isset(Auth::user()->id) && Auth::user()->id!=""){
    		$user_roles = IsAdminRoles::join('roles','role_user.role_id','=','roles.id')
    		->where('user_id', Auth::user()->id)->select('roles.is_admin','roles.name')->get();
    		$admin=0;
    		foreach($user_roles as $item) {
    			if($item->is_admin==1)
    			{
    				$admin=1;
    			} 
    	
    		}
    	
    		if($admin==1){
    			
    			return view('admin/dashboard');
    		}
    	
    	}
    	return view('auth/login');
       
    }
	



}
