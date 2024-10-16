<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
    
    public function show($id) {
        $recipe = Recipe::findOrFail($id);
        return view('recipeschicken.chicken_adobo', compact('recipe'));
    }

    
}
