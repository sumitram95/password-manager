<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class UsersPasswordManangers extends Model
{
    use HasFactory, HasRoles;
    protected $fillable = [
        'user_id',
        'urls',
        'username',
        'password',
        'notes',
        'visibility'
    ];
    public function userInfoes()
    {
        return $this->hasOne(UsersInfo::class, 'user_id', 'user_id');
    }

}
