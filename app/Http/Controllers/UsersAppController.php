<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersApp;

class UsersAppController extends Controller
{
    public function index()
    {
        $users = UsersApp::all();

        return response()->json([
            'users' => $users
        ], 200);
    }

    public function show(int $id)
    {
        $user = UsersApp::find($id);
        
        if(!$user)
        {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        return response()->json([
            'user' => $user
        ], 200);
    }

    public function store(Request $request)
    {
        try{
            $user = new UsersApp();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->genre = $request->input('genre');
            $user->age = $request->input('age');   
            $user->save();
    
            return response(200)->json([
                'user' => $user
            ], 201);
        } catch( Exception $e ){
            throw new Exception( $e );
        }
    }
}
