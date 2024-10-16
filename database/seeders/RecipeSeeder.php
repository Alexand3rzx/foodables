<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        DB::table('recipes')->insert([
            'name' => 'Chicken Adobo',
            'description' => 'Chicken Adobo is a classic Filipino dish characterized by its savory and tangy flavors.',
            'ingredients' => '1 kg Chicken, cut into pieces; 1/2 cup Soy sauce; 1/2 cup Vinegar; 1 head Garlic, minced; 1 Bay leaf; Salt and pepper to taste; 1 cup Water',
            'instructions' => '1. Combine chicken, soy sauce, vinegar, garlic, and bay leaf in a bowl. Marinate for at least 30 minutes. 2. Transfer to a pot, add water, and bring to a boil. Reduce heat and simmer for 30-40 minutes. 3. Season with salt and pepper. Serve with steamed rice for a delightful meal.',
        ]);
    }
}