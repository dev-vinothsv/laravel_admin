<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function roles()
	{
		return $this->belongsToMany('App\Role')->withTimestamps();
	}

	public function hasRole($name)
	{
		foreach ($this->roles as $role)
		{
			if ( $role->name == $name )
			{
				return true;
			}
		}

		return false;
	}


	public function assignRole($role)
	{
		$this->roles()->attach($role);
	}


	public function removeRole($role)
	{
		$this->roles()->detach($role);
	}
}
