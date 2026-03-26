<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockedAccount extends Model
{
    public function admin(){
        return $this->belongsTo(User::class);
    }

    public function account(){
        return $this->belongsTo(Account::class);
    }
}
