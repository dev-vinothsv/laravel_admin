<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest as LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use App\Models\AssignedRoles as IsAdminRoles;
use Illuminate\Support\Arr;
class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/
	
	use AuthenticatesUsers;
	
	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	 public function __construct(Guard $auth,User $user)
    {
		$this->auth = $auth;
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

	 public function login(LoginRequest $request)
    {
		$credentials = $request->only('email', 'password');
		$user_credentials= Arr::add($credentials, 'confirmed', '1');
		if ($this->auth->attempt($user_credentials)) {
				    $user_roles = IsAdminRoles::join('roles','role_user.role_id','=','roles.id')
					  ->where('user_id', $this->auth->id())->select('roles.is_admin','roles.name')->get();
					    $admin=0;
					  foreach($user_roles as $item) {
						if($item->is_admin==1)
						{
							$admin=1;
						}	 
					}
					return redirect('/admin/dashboard');
					
				}
        return redirect('/login')->withErrors([
            'email' => 'These credentials do not match our records.'
        ]);
    }
}
