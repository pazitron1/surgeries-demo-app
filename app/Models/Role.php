<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Role is associated with many Teams
     * @return  App\Model\Team;
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'role_team_user', 'role_id', 'team_id')->withPivot('user_id');
    }

    /**
    * Role is associated with many Users
    * @return  App\Model\User;
    */
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_team_user', 'role_id', 'user_id')->withPivot('team_id');
    }

    /**
    * Role is associated with many Permissions
    * @return  App\Model\Permission;
    */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }
}
