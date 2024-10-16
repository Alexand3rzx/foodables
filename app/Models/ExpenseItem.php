<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseItem extends Model
{
    use HasFactory;

    protected $fillable = ['expense_list_id', 'item_name', 'price'];

    public function expenseList()
    {
        return $this->belongsTo(ExpenseList::class);
    }
}
