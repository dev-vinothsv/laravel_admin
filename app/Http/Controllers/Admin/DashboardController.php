<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use DB;
use Carbon\Carbon;
use Log;
use App\Models\User;
use App\Helpers;
use Auth;
class DashboardController extends AdminController {

    public function __construct()
    {
        parent::__construct();
        view()->share('type', '');
    }

	public function index()	{
      
      $user_id = Auth::id();
		  $is_admin = 0;
        if(Auth::user()->hasRole('admin')){
          $is_admin = 1;
		}else if(Auth::user()->hasRole('default')){
		  $is_admin = 2;
		}

        $title = "Dashboard";
        $users =User::join('role_user','users.id','=','role_user.user_id')->join('roles','role_user.role_id','=','roles.id');
        if(!Auth::user()->hasRole('admin')){
	   	 $users->where("roles.is_admin","!=",1);
	    }
        $users_count = $users->count();
		       

		return view('admin.dashboard',  compact('users_count'));
	

  }
	
	
}

