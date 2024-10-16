<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseListsTable extends Migration
{
    public function up()
    {
        Schema::create('expense_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Expense list name
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to user
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expense_lists');
    }
}