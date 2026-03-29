<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

#[Fillable(['first_name', 'last_name', 'username', 'cin', 'date_of_birth', 'email', 'password', 'is_admin'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'date_of_birth' => 'date',
            'password' => 'hashed',
            'is_admin' => 'bool',
        ];
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function accounts()
    {
        return $this->belongsToMany('account_users', Account::class)->withPivot('role_id', 'accept_closure')->withTimestamps();
    }

    public function roles(){
        return $this->belongsToMany('account_users', Role::class)->withPivot('account_id', 'accept_closure')->withTimestamps();
    }

    public function transfers(){
        return $this->hasMany(Transfer::class);
    }

    public function blocked_accounts(){
        return $this->hasMany(BlockedAccount::class);
    }

    public function diposits(){
        return $this->hasMany(Diposit::class);
    }

    public function withdrawals(){
        return $this->hasMany(Withdrawal::class);
    }

    public function invitations(){
        return $this->hasMany(Invitation::class, 'sender_id');
    }

}
