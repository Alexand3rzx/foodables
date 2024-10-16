<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Expense Tracker</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f5f5f5;
                font-family: Arial, sans-serif;
                padding-top: 70px;
            }
            .navbar-custom {
                background-color: #ffa500;
                width: 100%;
            }
            .navbar-custom .navbar-brand, .navbar-custom .nav-link {
                color: black;
            }
            .navbar-custom .nav-link:hover {
                color: #ff7f00;
            }
            .container {
                background-color: #fff;
                padding: 30px;
                border-radius: 15px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                margin-top: 30px;
            }
            .card {
                margin-bottom: 20px;
                cursor: pointer;
            }
            .total {
                background-color: rgba(255, 165, 0, 0.3);
                padding: 15px;
                border-radius: 10px;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('logos/whitewc.jpg') }}" alt="FOODABLES Logo" style="height: 40px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">HOME</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">TOOLS</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('expenses.index') }}">Expense Tracker</a>
                        <a class="dropdown-item" href="{{ route('conversion.tool') }}">Conversion Tool</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">ABOUT</a></li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Expense Tracker</h2>
        
        <!-- Form to Create Expense List -->
        <form action="{{ route('expenses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="expenseListName">Expense List Name</label>
                <input type="text" class="form-control" id="expenseListName" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Expense List</button>
        </form>

        <hr>

        <!-- Display Expense Lists as Cards -->
        <div class="row">
            @foreach ($expenses as $expense)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body" data-toggle="modal" data-target="#expenseModal{{ $expense->id }}">
                        <h5 class="card-title">{{ $expense->name }}</h5>
                        <p class="card-text">Total Items: {{ $expense->items->count() }}</p>

                        <!-- Display limited items in the expense list -->
                        <ul class="list-group mb-2">
                            @foreach (array_slice($expense->items->toArray(), 0, 3) as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>{{ $item['item_name'] }}</strong>
                                    <span>₱{{ number_format($item['price'], 2) }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Show "View More" button if there are more than 3 items -->
                        @if ($expense->items->count() > 3)
                            <button class="btn btn-link" data-toggle="modal" data-target="#expenseModal{{ $expense->id }}">View More</button>
                        @endif

                        <!-- Display total sum of the expense list -->
                        <div class="total">
                            <h6>Total: ₱{{ number_format($expense->items->sum('price'), 2) }}</h6>
                        </div>
                        <!-- Delete Button -->
                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mt-2">Delete Expense List</button>
                        </form>
                    </div>
                </div>

                <!-- Expense Item Modal -->
                <div class="modal fade" id="expenseModal{{ $expense->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Manage Items for {{ $expense->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form to Add Item -->
                                <form action="{{ route('expenses.storeItem', $expense->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="itemName">Item Name</label>
                                        <input type="text" class="form-control" name="item_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="itemPrice">Item Price (₱)</label>
                                        <input type="number" class="form-control" name="price" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Add Item</button>
                                </form>

                                <h4 class="mt-3">Items</h4>
                                <ul class="list-group" id="itemList{{ $expense->id }}">
                                    @foreach ($expense->items as $item)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>{{ $item->item_name }}</strong> - ₱{{ number_format($item->price, 2) }}
                                            </div>
                                            <div>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editItemModal{{ $item->id }}">Edit</button>
                                                <form action="{{ route('expenses.deleteItem', $item->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </li>

                                        <!-- Edit Item Modal -->
                                        <div class="modal fade" id="editItemModal{{ $item->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Item</h5>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('expenses.updateItem', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Item Name</label>
                                                                <input type="text" class="form-control" name="item_name" value="{{ $item->item_name }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Item Price (₱)</label>
                                                                <input type="number" class="form-control" name="price" value="{{ $item->price }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>

                                <!-- Total Expense Summary -->
                                <div class="total">
                                    <h5>Total: ₱{{ number_format($expense->items->sum('price'), 2) }}</h5>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <!-- Export to CSV Button -->
                                <a href="{{ route('expenses.exportCsv', $expense->id) }}" class="btn btn-primary">Export to CSV</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
</x-app-layout>
