<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'recipe_id' => 'required|exists:recipes,id', // Validate the recipe ID
        ]);

        $favorite = new UserFavorite();
        $favorite->user_id = Auth::id(); // Assuming you are using authentication
        $favorite->recipe_id = $request->recipe_id; // Get the recipe ID from the request

        // Save to the database
        $favorite->save();

        

        try {
            $favorite->save();
            return redirect()->back()->with('success', 'Recipe added to favorites!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add recipe to favorites: ' . $e->getMessage());
        }
    }
}
