<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade');
            $table->string('recipe_name'); // Store the name of the recipe
            $table->string('recipe_image')->nullable(); // Optional: Store the recipe image URL
            $table->unsignedBigInteger('recipe_id'); // Add this line for the recipe ID
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop foreign key for user_id first
            $table->dropColumn('recipe_id'); // Drop recipe_id column
        });
    }
};
