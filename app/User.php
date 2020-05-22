<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use  HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role', 'referred_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $appends = ['refereeName'];

    public function getRefereeNameAttribute()
    {
        return User::where('id', $this->referred_by)->value('name');
    }


     public function orders(){
        return $this->hasMany(Order::class,'user_id','id');
    }



    public function referee(){
        return $this->belongsTo(User::class,'referred_by','id');
    }



   // Returns users count referrence by current user
    public function referredUsers(){
        $count = User::where('referred_by',$this->id)->count();

        return $count;
    }

    // You can create points from here , if you reference may be you get 10 pointa
    //  Multiply this by 10

    // eg Auth::user()->rederredUsers() + 10 points = User points
}
