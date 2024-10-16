<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function showChickenAdobo()
    {
        // Retrieve the Chicken Adobo recipe from the database
    $recipe = Recipe::where('name', 'Chicken Adobo')->first();

    // Pass the recipe to the view
    return view('recipeschicken.chicken_adobo', compact('recipe'));
    }

    public function chickenAdobo()
{
    // You can define the recipe details here
    $recipe = [
        'id' => 1, // Assuming this is the ID you want to associate with Chicken Adobo
        'name' => 'Chicken Adobo',
        'description' => 'Chicken Adobo is a classic Filipino dish characterized by its savory and tangy flavors.',
    ];

    return view('recipeschicken.chicken_adobo', compact('recipe'));
}

public function showFriedRice()
{
    // You can define the recipe details here
    $recipe = [
        'id' => 2, // Assuming this is the ID you want to associate with Chicken Fried Rice
        'name' => 'Chicken Fried Rice',
        'description' => 'A delicious and flavorful fried rice dish made with chicken, vegetables, and soy sauce.',
    ];

    return view('recipeschicken.chicken_fried_rice', compact('recipe'));
}

public function showAfritada()
{
    // You can define the recipe details here
    $recipe = [
        'id' => 3, // Assuming this is the ID you want to associate with Chicken Afritada
        'name' => 'Chicken Afritada',
        'description' => 'A savory Filipino dish made with chicken, potatoes, carrots, and bell peppers simmered in tomato sauce.',
    ];

    return view('recipeschicken.chicken_afritada', compact('recipe'));
}

public function showPorkAdobo()
{
    $recipe = [
        'id' => 4,
        'name' => 'Pork Adobo',
        'description' => 'A Filipino favorite, Pork Adobo is a savory dish made by marinating pork in vinegar, soy sauce, and spices.',
    ];

    return view('recipespork.pork_adobo', compact('recipe'));
}

public function showBicolExpress()
{
    $recipe = [
        'id' => 5,
        'name' => 'Bicol Express',
        'description' => 'A spicy dish made with pork, coconut milk, and chili peppers, originating from Bicol, Philippines.',
    ];

    return view('recipespork.bicol_express', compact('recipe'));
}

public function showLechonKawali()
{
    $recipe = [
        'id' => 6,
        'name' => 'Lechon Kawali',
        'description' => 'A deep-fried crispy pork belly dish served with a savory sauce, perfect for celebrations.',
    ];

    return view('recipespork.lechon_kawali', compact('recipe'));
}

public function chickenTinola() {
    return view('recipeschicken.chicken_tinola');
}


 public function showChickenCurry()
 {
     return view('recipeschicken.chicken_curry');
 }

// Pork Recipes

public function porkAdobo() {
    return view('recipespork.pork_adobo');
}

public function bicolExpress() {
    return view('recipespork.bicol_express');
}

public function lechonKawali() {
    return view('recipespork.lechon_kawali');
}

public function porkSinigang() {
    return view('recipespork.pork_sinigang');
}

public function showCrispyPata()
    {
        return view('recipes.pork.crispy_pata');
    }

}




