<?php

namespace App\Http\Controllers;

use App\Models\recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $users = User::all();
        $recipes = recipe::all();
        return view('recipes.index',compact('recipes','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recipe = new recipe();
        $recipe->name = $request->nameRecipe;
        $recipe->cantProtein = $request->ProteCant;
        $recipe->cantCarbo = $request->CantCarbo;
        $recipe->cantVerd = $request->VerdCant;
        $recipe->save();
        return redirect()->route('recipe.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recipe = recipe::fin('$id');
        return view('recipes.edit',compact('recipes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $recipe = recipe::find($id);
        $recipe->name = $request->nameRecipe;
        $recipe->cantProtein = $request->ProteCant;
        $recipe->cantCarbo = $request->CarboCant;
        $recipe->cantVerd = $request->VerdCant;
        return redirect()->route('recipe.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = recipe::find($id);
        $recipe->delete();
        return redirect()->route('recipes.index');
    }
}
