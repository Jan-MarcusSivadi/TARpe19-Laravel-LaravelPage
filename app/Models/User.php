<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // Neid välju ei võta vastu (exclude fields)
    // protected $guarded = [
    //     'password',
    // ];
    // Neid välju võetakse vastu (include fields)
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function uploadAvatar($image) {
        $avatar = $request->image->getClientOriginalName();
        $request->image->storeAs('images',$avatar,'public');
        auth()->user()->update(['avatar' => $avatar]);
    }

    // public function setPasswordAttribute($value)
    // {
    //     // $this->attributes['password'] = bcrypt($value);
    //     $this->attributes['password'] = $value; 
    // }

    // public function getNameAttribute($value)
    // {
    //     return "My name is: " . ucfirst($value);
    // }

    public function todos() {
        return $this->hasMany(Todo::class);
    }
}
