<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * User is associated with many Teams
     * @return  App\Models\Team;
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'role_team_user', 'user_id', 'team_id')->withPivot('role_id');
    }

    /**
    * User is associated with many Roles
    * @return  App\Models\Role;
    */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_team_user', 'user_id', 'role_id')->withPivot('team_id');
    }
}
