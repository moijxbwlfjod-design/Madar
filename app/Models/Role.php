<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
        return $this->belongsToMany('account_users', User::class)->withPivot('account_id', 'accept_closure')->withTimestamps();
    }
}
