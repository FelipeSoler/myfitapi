<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExercisesCategories;

class ExercisesCategoriesController extends Controller
{
    public function index()
    {
        $categories = ExercisesCategories::all();

        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function show(int $id)
    {
        $category = ExercisesCategories::find($id);
        
        if(!$category)
        {
            return response()->json([
                'message' => 'Category not found'
            ], 404);
        }

        return response()->json([
            'category' => $category
        ], 200);
    }

    public function store(Request $request)
    {
        $category = new ExercisesCategories();
        $category->name = $request->input('name');
        $category->save();

        return response()->json([
            "message" => "Category created successfully",
            "category" => $category
        ], 201);
    }

    public function storeAll(Request $request)
    {
        if (!$request->input('categories')) {
            return response()->json([
                "message" => "No categories provided"
            ], 400);
        }

        try{            
            $categories = $request->input('categories', []);
            foreach($categories as $category){
                $newCategory = new ExercisesCategories();
                $newCategory->name = $category['name'];
                $newCategory->save();   
            };
            return response()->json([
                "message" => $categories
            ], 200);
        }catch (Exception $e){
            return response()->json([
                "message" => sprintf("Error creating all categories: %s",$e)
            ], 500);
            throw new Exception($e);
        }
    }    
}
