<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Routines;
use App\Models\UsersApp;

class RoutinesController extends Controller
{
    public function index()
    {
        $routines = Routines::all();

        return response()->json([
            "routines" => $routines
        ], 200);
    }

    public function show(int $id)
    {
        $routine = Routines::find($id);

        return response()->json([
            "routine" => $routine
        ], 200);
    }

    public function store(Request $request)
    {
        if(!request) return response()->json(["message" => "Please post an valid routine"], 400);

        $user = UsersApp::find(request->input('user_id'));
        if(!$user){
            return response()->json(["message" => "User not found"], 404);
        }

        $routine = new Routines();
        $routine->name = request->input('name');
        $routine->name = request->input('user_id');
        $routine->save();

        return response()->json([
            "routine" => $routine
        ], 200);
    }
}
