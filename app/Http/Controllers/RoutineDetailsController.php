<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Routine;

class RoutineDetailsController extends Controller
{
    public function index()
    {
        $routines = Routine::all();
        return response()->json([
            "routines" => $routines
        ], 200);
    }
}
