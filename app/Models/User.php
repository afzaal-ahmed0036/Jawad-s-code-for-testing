<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
  
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
  

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id'
    ];
  
 
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
      protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function getAll()
    // {
    //     return static::paginate(2);
    // }


    // public function findUser($id)
    // {
    //     return static::find($id);
    // }


    // public function deleteUser($id)
    // {
    //     return static::find($id)->delete();
    // }
}
