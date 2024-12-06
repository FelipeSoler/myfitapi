<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Routines;
use App\Models\Exercises;

class RoutineDetails extends Model
{
    protected $fillable = [
        'routine_id',
        'exercise_id',
        'sets',
        'reps',
        'weight'
    ];

    public function Routine() : BelongsTo
    {
      return $this->belongsTo(Routines::class, 'id');
    }

    public function Exercise() : BelongsTo
    {
      return $this->belongsTo(Exercises::class, 'id');
    }
}
