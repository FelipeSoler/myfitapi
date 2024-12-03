<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercises;
use App\Models\ExercisesCategories;

class ExercisesController extends Controller
{
    public function index()
    {
        return response()->json([
            'exercises' => Exercises::all()
        ], 200);
    }

    public function show(int $id){
        $exercise = Exercises::find($id);

        if(!$exercise)
        {
            return response()->json([
                'message' => 'Exercise not found'
            ], 404);
        }

        return response()->json([
            "Exercise" => $exercise
        ], 200);
    }

    public function store(Request $request)
    {
        if(!$request){
            return response()->json([
                'message' => 'Exercise is required.'
            ], 404);
        };

        $category = ExercisesCategories::find($request->input('category_id'));

        if(!$category){
            return response()->json([
                "message" => "We can't found the category, please try again"
            ], 404);
        }
        try{
            $exercise = new Exercises();
            $exercise->name = $request->input('name');
            $exercise->category_id = $request->input('category_id');
            $exercise->save();
            return response()->json([
                "message" => "Exercise created successfully",
                "exercise" => $exercise
            ], 201);      
        }catch(Exception $e){
            return response()->json([
                "message" => "An error was ocurred: ". $e->getMessage
            ], 500);
        }

    }
}