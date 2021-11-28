<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Contracts\Routing\ResponseFactory;

use App\Models\AssignedRoles;

class Admin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null)
	{		
		
		if (Auth::guard($guard)->guest())
		{
			$admin = 0;
			$user_roles = AssignedRoles::join('roles','role_user.role_id','=','roles.id')
			->where('user_id', $this->auth->user()->id)->select('roles.is_admin')->get();
			foreach($user_roles as $item)
			{
				if($item->is_admin==1)
				{
					$admin=1;
				}
			}
			if($admin==0){
				return redirect('/');
			}
			return redirect('/');
		}
		
		return redirect('/');
	}
	


}
