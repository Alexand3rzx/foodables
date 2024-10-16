<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FOODABLES - Favorites</title>
        <!-- Bootstrap CSS CDN -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <style>
            body {
                background-color: #f5f5f5;
                font-family: Arial, sans-serif;
                padding-top: 70px; /* Space between navbar and body */
            }

            /* Navbar with black font */
            .navbar-custom {
                background-color: #ffa500; /* Orange background */
                width: 100%;
            }
            .navbar-custom .navbar-brand, 
            .navbar-custom .nav-link {
                color: black; /* Changed font color to black */
            }
            .navbar-custom .nav-link:hover {
                color: #ff7f00; /* Darker orange on hover */
            }

            /* Title container with orange background */
            .title-container {
                background-color: orange;
                padding: 20px;
                border-radius: 15px;
                margin-bottom: 40px;
                display: inline-block;
            }
            .title {
                font-size: 4rem;
                color: black; /* Font color for the title */
                margin: 0;
            }

            .section-title {
                font-size: 2rem;
                margin-bottom: 20px;
                text-align: center;
            }

            .food-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
                margin-top: 50px;
            }
            .food-box {
                background-color: white;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                text-align: center;
            }

            .category-box {
                background-color: rgba(255, 165, 0, 0.3); /* Transparent orange */
                padding: 20px;
                border-radius: 15px;
                max-width: 900px; /* Width of the box */
                margin: 30px auto; /* Center the box on the page */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            }

            /* Food box image styling */
            .food-box img {
                width: 100%;
                height: 150px;
                object-fit: cover;
                border-radius: 8px;
                margin-bottom: 10px;
            }

            /* Food box title styling */
            .food-box h3 {
                font-size: 1.2rem;
                color: black;
                margin-top: 10px;
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
    <li class="nav-item">
        <a class="nav-link" href="{{ route('favorites.index') }}">FAVORITES</a> <!-- Add this line -->
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

    <div class="container text-center">
        <div class="title-container">
            <img src="{{ asset('logos/welcome.jpg') }}" alt="FOODABLES Logo" class="logo" style="max-width: 200px;">
        </div>

        <h2>Your Favorite Recipes</h2>

        <!-- Favorites Section -->
        <div class="category-box">
            <h2 class="category-title">Favorites</h2>
            <div class="food-container">
                @if($favorites->isEmpty())
                    <p>No favorite recipes yet!</p>
                @else
                    @foreach($favorites as $favorite)
                        <div class="food-box" onclick="window.location.href='{{ route('recipes.show', $favorite->id) }}'">
                            <img src="{{ asset('recipes/' . $favorite->image) }}" alt="{{ $favorite->name }}" class="food-box-image">
                            <h3>{{ $favorite->name }}</h3>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </div>
    </body>
    </html>
</x-app-layout>
