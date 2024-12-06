<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Routines;
use App\Models\UsersApp;

class RoutinesController extends Controller
{
    public function index()
    {
        $routines = Routines::with(['RoutinesDetails'])->get();
        // $routines->details = ;

        return response()->json([
            "routines" => $routines
        ], 200);
    }

    public function show(string $id)
    {
        $routine = Routines::find($id);

        if(!$routine){
            return response()->json([
                "message" => "Routine not found"
            ], 404);
        }

        return response()->json([
            "routine" => $routine
        ], 200);
    }


    public function store(Request $request)
    {
        if(!$request) return response()->json(["message" => "Please post an valid routine"], 400);

        $user = UsersApp::find($request->input('user_id'));
        if(!$user){
            return response()->json(["message" => "User not found"], 404);
        }

        try{
            $routine = new Routines();
            $routine->name = $request->input('name');
            $routine->user_id = $request->input('user_id');
            $routine->save();
    
            return response()->json([
                "routine" => $routine
            ], 200);
        }catch(Exception $e){
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }

}
