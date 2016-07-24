<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table = "admin_users";
    protected $fillable = ['firstname', 'lastname', 'username', 'email', 'password', 'phone', 'role', 'status', 'zipcode','comment'];
   	protected $hidden = ['password'];

   	public function roles() {
   		return $this->belongsTo('Role');
   	}
}
