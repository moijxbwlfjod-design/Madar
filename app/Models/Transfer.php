<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    public function sender(){
        return $this->belongsTo(User::class);
    }

    public function senderAccount(){
        return $this->belongsTo(Account::class, 'sender_account_id');
    }

    public function receiverAccount(){
        return $this->belongsTo(Account::class, 'receiver_account_id');
    }
}
