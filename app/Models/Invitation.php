<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    public function sender(){
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function account(){
        return $this->belongsTo(Account::class);
    }
}
