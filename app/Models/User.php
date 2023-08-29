<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/* @mixin \Eloquent */
class User extends Authenticatable
{
    
    use Notifiable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function avatar()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->id) . '?s=80&d=mp';
    }
 
    public function businesses()
    {
        return $this->hasMany(Business::class,'created_by');
            
    }

    public function messages()
    {
        return $this->hasMany(Messanger::class);
    }
 

 
}
