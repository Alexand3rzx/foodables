<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseItemsTableSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['expense_list_id' => 9, 'item_name' => 'Chicken', 'price' => 150.00],
            ['expense_list_id' => 9, 'item_name' => 'Rice', 'price' => 50.00],
            ['expense_list_id' => 9, 'item_name' => 'Tomatoes', 'price' => 30.00],
            ['expense_list_id' => 9, 'item_name' => 'Onions', 'price' => 20.00],
            ['expense_list_id' => 9, 'item_name' => 'Garlic', 'price' => 15.00],
            ['expense_list_id' => 9, 'item_name' => 'Ginger', 'price' => 25.00],
            ['expense_list_id' => 9, 'item_name' => 'Bell Peppers', 'price' => 40.00],
            ['expense_list_id' => 9, 'item_name' => 'Carrots', 'price' => 30.00],
            ['expense_list_id' => 9, 'item_name' => 'Potatoes', 'price' => 25.00],
            ['expense_list_id' => 9, 'item_name' => 'Soy Sauce', 'price' => 60.00],
            ['expense_list_id' => 9, 'item_name' => 'Vinegar', 'price' => 45.00],
            ['expense_list_id' => 9, 'item_name' => 'Fish Sauce', 'price' => 40.00],
            ['expense_list_id' => 9, 'item_name' => 'Sugar', 'price' => 20.00],
            ['expense_list_id' => 9, 'item_name' => 'Salt', 'price' => 10.00],
            ['expense_list_id' => 9, 'item_name' => 'Black Pepper', 'price' => 25.00],
            ['expense_list_id' => 9, 'item_name' => 'Olive Oil', 'price' => 100.00],
            ['expense_list_id' => 9, 'item_name' => 'Butter', 'price' => 80.00],
            ['expense_list_id' => 9, 'item_name' => 'Coconut Milk', 'price' => 70.00],
            ['expense_list_id' => 9, 'item_name' => 'Lemon', 'price' => 15.00],
            ['expense_list_id' => 9, 'item_name' => 'Lime', 'price' => 15.00],
            ['expense_list_id' => 9, 'item_name' => 'Chili Peppers', 'price' => 30.00],
            ['expense_list_id' => 9, 'item_name' => 'Coriander', 'price' => 25.00],
            ['expense_list_id' => 9, 'item_name' => 'Basil', 'price' => 30.00],
            ['expense_list_id' => 9, 'item_name' => 'Thyme', 'price' => 25.00],
            ['expense_list_id' => 9, 'item_name' => 'Oregano', 'price' => 25.00],
            ['expense_list_id' => 9, 'item_name' => 'Parsley', 'price' => 30.00],
            ['expense_list_id' => 9, 'item_name' => 'Bay Leaves', 'price' => 20.00],
            ['expense_list_id' => 9, 'item_name' => 'Rice Noodles', 'price' => 80.00],
            ['expense_list_id' => 9, 'item_name' => 'Spaghetti', 'price' => 60.00],
            ['expense_list_id' => 9, 'item_name' => 'Chicken Broth', 'price' => 50.00],
            ['expense_list_id' => 9, 'item_name' => 'Eggs', 'price' => 35.00],
            ['expense_list_id' => 9, 'item_name' => 'Cheese', 'price' => 100.00],
            ['expense_list_id' => 9, 'item_name' => 'Tofu', 'price' => 60.00],
            ['expense_list_id' => 9, 'item_name' => 'Pork', 'price' => 200.00],
            ['expense_list_id' => 9, 'item_name' => 'Beef', 'price' => 250.00],
            ['expense_list_id' => 9, 'item_name' => 'Shrimp', 'price' => 300.00],
            ['expense_list_id' => 9, 'item_name' => 'Mussels', 'price' => 350.00],
            ['expense_list_id' => 9, 'item_name' => 'Crabs', 'price' => 400.00],
            ['expense_list_id' => 9, 'item_name' => 'Scallops', 'price' => 450.00],
            ['expense_list_id' => 9, 'item_name' => 'Vegetable Oil', 'price' => 80.00],
            ['expense_list_id' => 9, 'item_name' => 'Sesame Oil', 'price' => 90.00],
            ['expense_list_id' => 9, 'item_name' => 'Peanuts', 'price' => 40.00],
            ['expense_list_id' => 9, 'item_name' => 'Almonds', 'price' => 70.00],
            ['expense_list_id' => 9, 'item_name' => 'Walnuts', 'price' => 100.00],
            ['expense_list_id' => 9, 'item_name' => 'Dried Apricots', 'price' => 80.00],
            ['expense_list_id' => 9, 'item_name' => 'Dates', 'price' => 90.00],
            ['expense_list_id' => 9, 'item_name' => 'Raisins', 'price' => 30.00],
            ['expense_list_id' => 9, 'item_name' => 'Honey', 'price' => 150.00],
            ['expense_list_id' => 9, 'item_name' => 'Maple Syrup', 'price' => 200.00],
            ['expense_list_id' => 9, 'item_name' => 'Yogurt', 'price' => 50.00],
            ['expense_list_id' => 9, 'item_name' => 'Ice Cream', 'price' => 120.00],
            ['expense_list_id' => 9, 'item_name' => 'Cream', 'price' => 80.00],
            ['expense_list_id' => 9, 'item_name' => 'Milk', 'price' => 50.00],
            ['expense_list_id' => 9, 'item_name' => 'Orange Juice', 'price' => 70.00],
            ['expense_list_id' => 9, 'item_name' => 'Apple Juice', 'price' => 60.00],
            ['expense_list_id' => 9, 'item_name' => 'Coffee', 'price' => 40.00],
            ['expense_list_id' => 9, 'item_name' => 'Tea', 'price' => 30.00],
            ['expense_list_id' => 9, 'item_name' => 'Cereal', 'price' => 100.00],
            ['expense_list_id' => 9, 'item_name' => 'Granola Bars', 'price' => 80.00],
            ['expense_list_id' => 9, 'item_name' => 'Snacks', 'price' => 150.00],
            ['expense_list_id' => 9, 'item_name' => 'Chips', 'price' => 60.00],
            ['expense_list_id' => 9, 'item_name' => 'Popcorn', 'price' => 40.00],
            ['expense_list_id' => 9, 'item_name' => 'Candy', 'price' => 30.00],
            ['expense_list_id' => 9, 'item_name' => 'Chocolate', 'price' => 70.00],
            ['expense_list_id' => 9, 'item_name' => 'Beverages', 'price' => 100.00],
            ['expense_list_id' => 9, 'item_name' => 'Condiments', 'price' => 50.00],
            ['expense_list_id' => 9, 'item_name' => 'Jams', 'price' => 40.00],
            ['expense_list_id' => 9, 'item_name' => 'Sauces', 'price' => 60.00],
            ['expense_list_id' => 9, 'item_name' => 'Marinades', 'price' => 50.00],
            ['expense_list_id' => 9, 'item_name' => 'Spices', 'price' => 30.00],
            ['expense_list_id' => 9, 'item_name' => 'Salad Dressings', 'price' => 50.00],
            ['expense_list_id' => 9, 'item_name' => 'Pickles', 'price' => 25.00],
            ['expense_list_id' => 9, 'item_name' => 'Salsa', 'price' => 40.00],
            ['expense_list_id' => 9, 'item_name' => 'Guacamole', 'price' => 100.00],
            ['expense_list_id' => 9, 'item_name' => 'Hummus', 'price' => 80.00],
            ['expense_list_id' => 9, 'item_name' => 'Pesto', 'price' => 90.00],
            ['expense_list_id' => 9, 'item_name' => 'Relish', 'price' => 30.00],
            ['expense_list_id' => 9, 'item_name' => 'Nut Butter', 'price' => 70.00],
            ['expense_list_id' => 9, 'item_name' => 'Fruits', 'price' => 40.00],
            ['expense_list_id' => 9, 'item_name' => 'Vegetables', 'price' => 30.00],
            ['expense_list_id' => 9, 'item_name' => 'Bread', 'price' => 50.00],
            ['expense_list_id' => 9, 'item_name' => 'Rolls', 'price' => 40.00],
            ['expense_list_id' => 9, 'item_name' => 'Bagels', 'price' => 60.00],
            ['expense_list_id' => 9, 'item_name' => 'Pasta', 'price' => 50.00],
            ['expense_list_id' => 9, 'item_name' => 'Dumplings', 'price' => 80.00],
            ['expense_list_id' => 9, 'item_name' => 'Tortillas', 'price' => 60.00],
        ];

        DB::table('expense_items')->insert($items);
    }
}
