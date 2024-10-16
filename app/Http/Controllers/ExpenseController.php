<?php

namespace App\Http\Controllers;

use App\Models\ExpenseList;
use App\Models\ExpenseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = ExpenseList::where('user_id', Auth::id())->get();
        return view('expense-tracker', compact('expenses')); // Pass the $expenses variable to the view
    }

    public function store(Request $request)
    {
       // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Create a new expense list associated with the logged-in user
    $expenseList = new ExpenseList();
    $expenseList->name = $request->name;
    $expenseList->user_id = Auth::id(); // Associate with the currently logged-in user
    $expenseList->save();

    // Redirect back with a success message
    return redirect()->route('expenses.index')->with('success', 'Expense list created successfully.');
    }

    public function storeItem(Request $request, $listId)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        ExpenseItem::create([
            'expense_list_id' => $listId,
            'item_name' => $request->item_name,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Item added successfully!');
    }

    public function destroy($id)
{
    $expense = ExpenseList::find($id);

    if ($expense) {
        $expense->delete();
        $expense->items()->delete(); // Delete associated items if necessary
        return redirect()->back()->with('success', 'Expense list deleted successfully.');
    }

    return redirect()->back()->with('error', 'Expense list not found.');
}

public function updateItem(Request $request, $itemId)
{
    $request->validate([
        'item_name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
    ]);

    $item = ExpenseItem::find($itemId);
    $item->update([
        'name' => $request->item_name,
        'price' => $request->price,
    ]);

    return redirect()->back()->with('success', 'Item updated successfully!');
}

public function deleteItem($itemId)
{
    $item = ExpenseItem::find($itemId);
    $item->delete();

    return redirect()->back()->with('success', 'Item deleted successfully!');
}

public function exportCsv($id)
    {
        // Get the specific expense list
        $expense = ExpenseList::with('items')->findOrFail($id);

        // Define the CSV header, including id, expense_list_id, item_name, price, and created_at
        $csvHeader = ['ID', 'Expense List ID', 'Item Name', 'Price', 'Created At'];

        // Create the CSV rows
        $csvRows = $expense->items->map(function($item) use ($expense) {
            return [
                $item->id,                 // ID of the item
                $expense->id,              // Expense List ID (same for all items in this list)
                $item->item_name,          // Name of the item
                $item->price,              // Price of the item
                $item->created_at          // When the item was created
            ];
        })->toArray();

        // Create the CSV file content
        $csvContent = implode(",", $csvHeader) . "\n";
        foreach ($csvRows as $row) {
            $csvContent .= implode(",", $row) . "\n";
        }

        // Define the filename
        $filename = $expense->name . '_items.csv';

        // Return the CSV as a download response
        return response($csvContent)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}

