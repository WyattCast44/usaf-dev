<?php

namespace App\Models\Reference;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
