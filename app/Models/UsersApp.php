<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UsersApp extends Model
{
    public function Routines() : HasMany
    {
        return $this->hasMany(Routines::class);
    }
}
