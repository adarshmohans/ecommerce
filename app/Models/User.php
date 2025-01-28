<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    // public function getDobAttribute($value){
    //     return date('d-M-Y', strtotime($value));
    // }

    protected $dates=['dob'];


    protected $fillable = ['name','email','dob','status'];

    public function getDobFormatedAttribute(){
        return date('d-M-Y', strtotime($this->dob));
    }

    public function getStatusTextAttribute(){
        if($this->status==1) return "Active";
        else return "Inactive";
    }

    public function scopeActive($query) {
        return $query->where('status',1);
    }

    public function address(){
        return $this->hasOne(UserAddress::class, 'user_id', 'id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
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
    ];

    protected $appends= ['dob_formated'];
}
