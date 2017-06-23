<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Employee extends Eloquent
{
    protected $table = 'users';

	public function children()
	{
	   return $this->hasOne('App\Employee', 'manager_user_id');
	}

// recursive, loads all descendants
	public function childrenRecursive()
	{
	   return $this->children()->with('childrenRecursive');
	}
	
}
