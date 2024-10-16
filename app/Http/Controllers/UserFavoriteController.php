<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class UserFavoriteController extends Controller
{
    public function add(Request $request, $recipeId)
{
    $userId = Auth::id();

    // Check if the user is authenticated
    if (!$userId) {
        return redirect()->back()->with('error', 'You must be logged in to add favorites.');
    }

    // Find the recipe by ID
    $recipe = Recipe::find($recipeId);
    if (!$recipe) {
        return redirect()->back()->with('error', 'Invalid recipe ID.');
    }

    // Check if the recipe is already in favorites
    $existingFavorite = Favorite::where('user_id', $userId)
                                ->where('recipe_id', $recipeId)
                                ->first();

    if ($existingFavorite) {
        return redirect()->back()->with('info', 'Recipe is already in your favorites!');
    }

    // Create a new favorite
    try {
        $favorite = new Favorite();
        $favorite->user_id = $userId;
        $favorite->recipe_id = $recipeId; // Set the foreign key to the recipe ID
        // Optionally, if you want to keep recipe name and image
        $favorite->recipe_name = $recipe->name; // Store the recipe name
        // $favorite->recipe_image = $recipe->image; // If you have an image field in recipes
        $favorite->save();

        return redirect()->back()->with('success', 'Recipe added to favorites!');
    } catch (\Exception $e) {
        \Log::error('Failed to add favorite: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to add recipe to favorites. Please try again.');
    }
}

    public function index()
    {
        // Retrieve all favorites for the authenticated user
        $favorites = Favorite::where('user_id', auth()->id())->get();

        return view('favorites.index', compact('favorites'));
    }
}