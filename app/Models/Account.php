<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'type_id',
        'rib',
        'balence',
        'monthly_withdraw_limit',
        'daily_transaction_limit',
    ];

    public function users(){
        return $this->belongsToMany('account_users', User::class)->withPivot('role_id', 'accept_closure')->withTimestamps();
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function diposits(){
        return $this->hasMany(Diposit::class);
    }

    public function sendedTransfers(){
        return $this->hasMany(Transfer::class, 'sender_account_id');
    }

    public function receiverTransfers(){
        return $this->hasMany(Transfer::class, 'receiver_account_id');
    }

    public function withdrawals(){
        return $this->hasMany(Withdrawal::class);
    }

    public function invitations(){
        return $this->hasMany(Invitation::class);
    }
}
