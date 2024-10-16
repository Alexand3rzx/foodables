<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConversionController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserFavoriteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [FoodController::class, 'index'])->middleware(['auth'])->name('dashboard')->middleware('verified');
 
Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  
});

 Auth::routes([
     'verify' => true
 ]);

 Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
   
});

Route::middleware(['auth'])->group(function () {
    Route::get('/expense-tracker', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store'); // To create an expense list
    Route::post('/expenses/item/{id}', [ExpenseController::class, 'storeItem'])->name('expenses.storeItem'); // To add an item to an expense list
   
});



Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
Route::post('/expenses/{id}/items', [ExpenseController::class, 'storeItem'])->name('expenses.storeItem');

Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');


Route::patch('/expenses/items/{item}', [ExpenseController::class, 'updateItem'])->name('expenses.updateItem');
Route::delete('/expenses/items/{item}', [ExpenseController::class, 'deleteItem'])->name('expenses.deleteItem');

require __DIR__.'/auth.php';

Route::get('/conversion-tool', function () {
    return view('conversion-tool');
})->name('conversion.tool');

Route::post('/conversion-tool', [ConversionController::class, 'convert'])->name('conversion.convert');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//chicken recipes
Route::get('/chicken-adobo', function () {
    return view('recipeschicken.chicken_adobo'); // Use dot notation for folders
});


// stopped on expense tracker, add design, and ayusin expense listing//

//favorite
Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
Route::post('/favorites/add/{recipe}', [FavoriteController::class, 'add'])->name('favorites.add');

// Define a route for Chicken Adobo
Route::get('/recipes/chicken-adobo', [RecipeController::class, 'showChickenAdobo'])->name('chicken.adobo');

//user favorites
Route::get('/favorites', [UserFavoriteController::class, 'index'])->name('favorites.index');
Route::post('/favorites/add/{recipeId}', [UserFavoriteController::class, 'add'])->name('favorites.add');

Route::get('/recipe/chicken-adobo', [RecipeController::class, 'chickenAdobo'])->name('recipe.chickenAdobo');
Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');

//chicken
Route::get('/recipes/chicken-adobo', [RecipeController::class, 'showChickenAdobo'])->name('chicken.adobo');
Route::get('/chicken-afritada', [RecipeController::class, 'showAfritada'])->name('chicken.afritada');
Route::get('/chicken-fried-rice', [RecipeController::class, 'showFriedRice'])->name('chicken.fried.rice');
Route::get('/chicken/tinola', [RecipeController::class, 'chickenTinola'])->name('chicken.tinola');
Route::get('/chicken/curry', [RecipeController::class, 'showChickenCurry'])->name('chicken.curry'); 

//pork
Route::get('/pork-adobo', [RecipeController::class, 'showPorkAdobo'])->name('pork.adobo');
Route::get('/bicol-express', [RecipeController::class, 'showBicolExpress'])->name('bicol.express');
Route::get('/lechon-kawali', [RecipeController::class, 'showLechonKawali'])->name('lechon.kawali');
Route::get('/pork/sinigang', [RecipeController::class, 'porkSinigang'])->name('pork.sinigang');
Route::get('/pork/crispy-pata', [RecipeController::class, 'showCrispyPata'])->name('crispy.pata');

Route::get('/expenses/{id}/export-csv', [ExpenseController::class, 'exportCsv'])->name('expenses.exportCsv');

Route::get('/about', function () {
    return view('about');
})->name('about');