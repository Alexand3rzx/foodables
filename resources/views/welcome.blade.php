<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOODABLES</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            padding-top: 70px; /* Space between navbar and body */
        }

        /* Navbar with a pint of orange */
        .navbar-custom {
            background-color: #ffa500; /* Orange color */
            width: 100%;
        }
        .navbar-custom .navbar-brand, 
        .navbar-custom .nav-link {
            color: black; /* White text */
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
            color: black;
            margin: 0;
        }

        .search-bar {
            margin-bottom: 40px;
        }
        .search-bar input {
            padding: 10px;
            width: 50%;
            font-size: 1.2rem;
        }

        /* Carousel image styling */
        .carousel-item img {
            height: 500px;
            object-fit: cover;
            width: 100%;
            border-radius: 15px;
        }

        /* Custom caption positioning */
        .custom-caption {
            position: absolute;
            bottom: 20px;
            left: 20px;
            text-align: left;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            padding: 10px;
            border-radius: 10px;
            max-width: 300px;
        }

        .custom-caption h5 {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            margin-bottom: 10px;
        }

        .custom-caption p {
            font-size: 1rem;
            color: white;
            margin: 0;
        }

        /* Improve text responsiveness */
        @media (max-width: 768px) {
            .custom-caption {
                font-size: 0.9rem;
                max-width: 100%;
                left: 10px;
                right: 10px;
            }
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
    </style>
</head>
<body>

    <!-- Full-width Navbar with a pint of orange -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <!-- Brand title -->
        <a class="navbar-brand" href="#">FOODABLES</a>
        
        <!-- Toggler for mobile -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Right-side buttons -->
        <ul class="navbar-nav">
            @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @endauth
            @endif
        </ul>
    </nav>


        <!-- Carousel for recipe images -->
        <div id="recipeCarousel" class="carousel slide mb-5" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner">
                <!-- First carousel item with adobo.jpg and the recipe text -->
                <div class="carousel-item active">
                    <img src="{{ asset('recipes/adobo.jpg') }}" class="d-block w-100" alt="Adobo Recipe">
                    <div class="carousel-caption custom-caption">
                        <h5>Chicken Adobo</h5>
                        <p>
                        Chicken Adobo is an example of a famous adobo version that is gaining popularity around the world.
                    </div>
                </div>

                <!-- Second carousel item -->
                <div class="carousel-item">
                    <img src="{{ asset('recipes/adobopork.jpg') }}" class="d-block w-100" alt="Recipe 2">
                    <div class="carousel-caption custom-caption">
                        <h5>Pork Adobo</h5>
                        <p>
                        Considered by some as the pride of Filipino cuisine, Pork Adobo is definitely a favorite among many around the world.
                    </div>
                </div>

                <!-- Third carousel item -->
                <div class="carousel-item">
                    <img src="{{ asset('recipes/bcexpress.jpg') }}" class="d-block w-100" alt="Recipe 3">
                    <div class="carousel-caption custom-caption">
                        <h5>Bicol Express</h5>
                        <p>
                        Bicol Express, in all of its well-balanced spice and sweetness, also makes for an irresistible cold day meal.
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" class="form-control mx-auto" placeholder="Search for a recipe...">
        </div>

        <!-- Food Boxes -->
        <div class="food-container">
            @foreach(range(1, 10) as $i)
            <div class="food-box">
                <h3>Food Item {{ $i }}</h3>
                <p>Description for Food Item {{ $i }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
