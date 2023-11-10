<?php

namespace App\Models;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\EmailVerifyNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * User wallets
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wallets(){
        return $this->hasMany(Wallet::class);
    }

    /**
     * User wallet
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wallet(){
        return $this->hasOne(Wallet::class);
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerifyNotification);
    }

    public function scopeActive(Builder $query){
        return $query->whereNotNull('email_verified_at');
    }
}
