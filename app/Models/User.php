<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $softDelete = true;

    protected $fillable = [
        'name', 'family', 'mobile', 'email',
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

    public function getDateFormat()
    {
        return 'U';
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

    public function deleteRole($role)
    {
        return $this->roles()->detach($role);
    }

}
