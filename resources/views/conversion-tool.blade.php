<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cooking Measurement Converter</title>
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
            }
            .result {
                margin-top: 20px;
                font-size: 1.5rem;
                color: #28a745;
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
        <h2 class="text-center">Cooking Measurement Converter</h2>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('conversion.convert') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="value">Value</label>
                        <input type="number" class="form-control" name="value" required step="any" placeholder="Enter value to convert">
                    </div>
                    <div class="form-group">
                        <label for="from_unit">From Unit</label>
                        <select class="form-control" name="from_unit" required>
                            <option value="teaspoon">Teaspoon</option>
                            <option value="tablespoon">Tablespoon</option>
                            <option value="cup">Cup</option>
                            <option value="milliliter">Milliliter</option>
                            <option value="liter">Liter</option>
                            <option value="grams">Grams</option>
                            <option value="kilograms">Kilograms</option>
                            <option value="pounds">Pounds</option>
                            <option value="ounces">Ounces</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="to_unit">To Unit</label>
                        <select class="form-control" name="to_unit" required>
                            <option value="teaspoon">Teaspoon</option>
                            <option value="tablespoon">Tablespoon</option>
                            <option value="cup">Cup</option>
                            <option value="milliliter">Milliliter</option>
                            <option value="liter">Liter</option>
                            <option value="grams">Grams</option>
                            <option value="kilograms">Kilograms</option>
                            <option value="pounds">Pounds</option>
                            <option value="ounces">Ounces</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Convert</button>
                </form>

                @if(session('result'))
                    <div class="result mt-3">
                        {{ session('result') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        {{ $errors->first() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Include Bootstrap's JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</x-app-layout>
