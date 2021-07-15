<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens,HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role_id',
        'img',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    ////////////////////////
    public function pharms()
    {
        return $this->hasMany(Pharm::class);
    }
/////////////////
    public function pharm_drugs()
    {
        return $this->hasMany(Pharm_drug::class);
    }
//////////////////
    public function drugs()
    {
        return $this->hasMany(Drug::class);
    }
///////////////
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
/////////////
    public function pharmacist()
    {
        return $this->belongsTo(Pharmacist::class);
    }
//////////////////
    public function user_role()
    {
        return $this->belongsTo(User_role::class);
    }
}
