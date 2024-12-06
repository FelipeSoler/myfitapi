<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\RoutineDetails;

class Exercises extends Model
{
    public function Details() : HasMany
    {
        return $this->hasMany(RoutineDetails::class, 'exercise_id');
    }
}
