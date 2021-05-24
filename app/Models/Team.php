<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    /**
     * Team is associated with many Users
     * @return  App\Model\User;
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_team_user', 'team_id', 'user_id')->withPivot('role_id');
    }
    /**
     * Team is associated with many Roles
     * @return  App\Model\Role;
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_team_user', 'role_id', 'team_id')->withPivot('user_id');
    }
}
