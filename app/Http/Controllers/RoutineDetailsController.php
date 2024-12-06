<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercises;
use App\Models\Routines;
use App\Models\RoutineDetails;

class RoutineDetailsController extends Controller
{
    public function index()
    {
        $routineDetails = RoutineDetails::with('Exercise')->get();

        return response()->json([
            "Routine Details" => $routineDetails
            ,200]);
    }

    public function show(int $id)
    {
        $routineDetails = RoutineDetais::find(id);

        if(!$routineDetails){
            return response()->json([
                "message" => "Routine Details not found"
            ], 404);
        }

        return response()->json([
            "Routine Details" => $routineDetails
        ], 200);
        
    }

    public function store(Request $request)
    {
        $routine = Routines::find($request->input('routine_id'));
        $exercise = Exercises::find($request->input('exercise_id'));

        if(!$routine or !$exercise){
            return response()->json([
                "message" => "Something went wrong with your request, please review the data and try again"
            ], 404);
        }

        $routineDetails = new RoutineDetails();
        $routineDetails->routine_id = $request->input('routine_id');
        $routineDetails->exercise_id = $request->input('exercise_id');
        $routineDetails->sets = $request->input('sets');
        $routineDetails->reps = $request->input('reps');
        $routineDetails->weight = $request->input('weight');
        $routineDetails->save();

        return response()->json([
            "message" => "Exercises saved successfully",
            "Routine Detail" => $routineDetails
        ], 201);
    }
}
