<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UsersInfo extends Model
{
protected $fillable=[
    'user_id',
    'f_name',
    'l_name',
];
public function user():BelongsTo
{
    return $this->belongsTo(User::class, 'user_id');
}

}
