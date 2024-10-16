<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseItemsTable extends Migration
{
    public function up()
    {
        Schema::create('expense_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expense_list_id')->constrained()->onDelete('cascade'); // Foreign key to expense list
            $table->string('item_name'); // Item name
            $table->decimal('price', 10, 2); // Item price
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expense_items');
    }
}