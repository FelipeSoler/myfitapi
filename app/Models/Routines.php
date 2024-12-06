<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\RoutineDetails;
use App\Models\UsersApp;
use Illuminate\Support\Str;

class Routines extends Model
{
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'user_id'
    ];
    
    public $incrementing = false;

    public function RoutinesDetails() : HasMany
    {
        return $this->hasMany(RoutineDetails::class, 'routine_id');
    }

    public function Users() : BelongsTo
    {
        return $this->belongsTo(UsersApp::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
            $model->routine_date = date('Y-m-d H:i:s');
        });
    }
}
