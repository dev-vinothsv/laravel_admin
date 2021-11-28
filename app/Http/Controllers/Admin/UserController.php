<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\AssignedRoles;
use App\Models\Role; 
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\UserEditRequest;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\UserNotificationPreferences; 
use DB;
use App\Helpers;
use Illuminate\Support\Str;


class UserController extends AdminController
{


    public function __construct()
    {
    	parent::__construct();
        view()->share('type', 'user');
    }

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index() {
    	
        // Show the page
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function Create()
    {
        $roles = Role::all();
        $selectedRoles = array();
        
        return view('admin.users.create_edit', compact('roles', 'selectedRoles'));
    }


	/**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function createProcess(UserRequest $request) {
        $user = new User ();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;        
        $user ->email = $request->email;
        $user->username = $request->email;
        $user->company = $request->company_name;
        $user->password = bcrypt($request->password);
        $user->confirmation_code = Str::random(32);
        $user->confirmed = $request->confirmed;
        $user->save();
		$user_id=$user->id;
        foreach($request->roles as $item)
        {
            $role = new AssignedRoles();
            $role->role_id = $item;
            $role->user_id = $user -> id;
            $role->save();
        }
		
		
		return redirect('admin/users')->with('success', 'User Created Successfully');
    }


    
    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function edit($id) {

        $user = User::where("users.id",$id)->get()->first();
        $roles = Role::all();
        $user_roles =AssignedRoles::where('user_id','=',$user->id)->get();
        $selectedRoles = array();
		foreach($user_roles as $item) {
			$selectedRoles[]=$item->role_id;
		}
		
		
        return view('admin.users.create_edit', compact('user', 'roles', 'selectedRoles'));

    }



    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
	public function editProcess(UserEditRequest $request, $id) {
        $user = User::find($id);
		$user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->first_name.' '.$request->last_name;
		$user -> company = $request->company_name;
        $user -> confirmed = $request->confirmed;

        $password = $request->password;
        $passwordConfirmation = $request->password_confirmation;

        if (!empty($password)) {
            if ($password === $passwordConfirmation) {
                $user -> password = bcrypt($password);
            }
        }
        $user -> save();
        AssignedRoles::where('user_id','=',$user->id)->delete();
        foreach($request->roles as $item)
        {
            $role = new AssignedRoles;
            $role -> role_id = $item;
            $role -> user_id = $user -> id;
            $role -> save();
        }
		

		return redirect('admin/users')->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */

      public function delete($id)
    {
        $user = User::find($id);
        // Show the page
        return view('admin.users.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */
    public function deleteProcess(DeleteRequest $request){
    	
    	$user_id = $request->id;    	
        $user= User::find($user_id);
        return $response = $user->delete();
    }


    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
	   $users = User::select(array('users.id', 'users.username', 'users.email', 'users.confirmed', 'users.created_at'));
		$datatable = app('datatables')->of($users)
	      ->editColumn('confirmed', '<span class="glyphicon glyphicon-ok"></span>')
            ->addColumn('actions', '<a href="{{{ url(\'admin/users/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
				@if ($id!="1")
				 @if(env("APP_ENV") != "prod")
				 <a href="#" class="btn btn-sm btn-danger" Onclick="deleteUser({{{$id}}});"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a> @endif
                @endif')
            ->removeColumn('id')
			->rawColumns(['actions', 'confirmed']);
        return $datatable->make(true);
    }

}
