<?php

namespace App\Models\Reference;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\User;

class Gender extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
