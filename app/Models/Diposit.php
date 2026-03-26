<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diposit extends Model
{
    public function owner(){
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function account(){
        return $this->belongsTo(Account::class);
    }
}
