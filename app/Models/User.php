<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'barangay_id',
        'name',
        'username',
        'email',
        'password',
        'role',
        'birthdate',
        'profile_image',
        'gender',
        'phone_number',
        'address',
        'marital_status',
        'city_id',
        'email_verified_at'
    ];

    public $incrementing = false;

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



    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }

    public function coordinates(){
        return $this->hasMany(Coordinates::class);
    }

    public function emergencyCall(){
        return $this->hasMany(EmergencyCall::class);
    }

    public function city(){
        return $this->hasOne(city::class,'id','city_id');
    }

    public function barangay(){
        return $this->hasOne(barang::class,'id','barangay_id');
    }

    public function history(){
        return $this->hasMany(HistoryLog::class,'user_id','id');
    }
   
}