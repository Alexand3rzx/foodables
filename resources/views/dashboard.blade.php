<x-app-layout>
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

            .search-bar {
                margin-bottom: 40px;
            }
            .search-bar input {
                padding: 10px;
                width: 50%;
                font-size: 1.2rem;
            }

            /* Top-rated container */
            .top-rated-container {
                background-color: orange; /* Pint of orange */
                padding: 30px;
                border-radius: 15px;
                margin-bottom: 40px;
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

            /* Hide navbar initially */
            .navbar {
                transition: top 0.3s;
            }
            .navbar-hidden {
                top: -100px; /* Adjust this based on your navbar height */
            }

            .card {
        border-radius: 10px;
        overflow: hidden;
    }
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
    .card-body {
        text-align: center;
    }
    .card-footer {
        background-color: white;
    }
    .card:hover {
        transform: translateY(-5px);
        transition: 0.3s ease;
    }

    .category-box {
    background-color: rgba(255, 165, 0, 0.3); /* Transparent orange */
    padding: 20px;
    border-radius: 15px;
    max-width: 900px; /* Width of the box */
    margin: 30px auto; /* Center the box on the page */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

/* Category title styling */
.category-title {
    text-align: center;
    font-size: 2rem;
    color: #333;
    margin-bottom: 20px;
}

/* Food container */
.food-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Responsive grid */
    gap: 20px;
}

/* Food box styling */
.food-box {
    background-color: white;
    padding: 15px;
    text-align: center;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}

.food-box:hover {
    transform: translateY(-5px); /* Subtle hover effect */
}

.food-box img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 10px;
}

.food-box h3 {
    font-size: 1.2rem;
    color: black;
    margin-top: 10px;
}

.category-container {
    background-color: rgba(255, 165, 0, 0.2); /* Transparent orange background */
    padding: 20px;
    border-radius: 15px;
    max-width: 1200px;
    margin: 0 auto;
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
    <a class="nav-link" href="{{ route('about') }}">ABOUT</a>
</li>
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
            <!-- Title with orange background -->
            <div class="title-container">
    <img src="{{ asset('logos/welcome.jpg') }}" alt="FOODABLES Logo" class="logo" style="max-width: 200px;"> <!-- Adjust the max-width as needed -->
</div>
           

            <h2>Welcome to Foodables!</h2>
            <p>Dive into a world of flavors with our delicious collection of Filipino recipes.</p>

          <!-- Chicken Recipes Section -->
<div class="category-box">
    <h2 class="category-title" style="font-family: 'Arial', sans-serif; font-size: 28px; font-weight: bold; color: #333; margin-bottom: 10px;">Chicken Recipes</h2>
    <p class="category-description" style="font-family: 'Arial', sans-serif; font-size: 16px; color: #666; margin-bottom: 20px;">Explore a range of delicious chicken dishes, from classic favorites to modern twists.</p>
    <div class="food-container">
        <!-- Chicken Adobo Food Box -->
        <a href="{{ route('chicken.adobo') }}">
            <div class="food-box">
                <img src="{{ asset('recipes/adobo.jpg') }}" alt="Chicken Adobo" class="food-box-image">
                <h3 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Chicken Adobo</h3>
            </div>
        </a>
        <!-- Chicken Fried Rice Food Box -->
        <a href="{{ route('chicken.fried.rice') }}">
            <div class="food-box">
                <img src="{{ asset('recipes/chicken-fried-rice.jpg') }}" alt="Chicken Fried Rice" class="food-box-image">
                <h3 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Chicken Fried Rice</h3>
            </div>
        </a>
        <!-- Chicken Afritada Food Box -->
        <a href="{{ route('chicken.afritada') }}">
            <div class="food-box">
                <img src="{{ asset('recipes/chiafri.jpg') }}" alt="Chicken Afritada" class="food-box-image">
                <h3 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Chicken Afritada</h3>
            </div>
        </a>
        <!-- New: Chicken Curry Food Box -->
        <a href="{{ route('chicken.curry') }}">
            <div class="food-box">
                <img src="{{ asset('recipes/chicken-curry.jpg') }}" alt="Chicken Curry" class="food-box-image">
                <h3 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Chicken Curry</h3>
            </div>
        </a>
    </div>
</div>

<!-- Pork Recipes Section -->
<div class="category-box">
    <h2 class="category-title" style="font-family: 'Arial', sans-serif; font-size: 28px; font-weight: bold; color: #333; margin-bottom: 10px;">Pork Recipes</h2>
    <p class="category-description" style="font-family: 'Arial', sans-serif; font-size: 16px; color: #666; margin-bottom: 20px;">Satisfy your cravings with these flavorful pork dishes, perfect for every occasion.</p>
    <div class="food-container">
        <!-- Pork Adobo Food Box -->
        <a href="{{ route('pork.adobo') }}">
            <div class="food-box">
                <img src="{{ asset('recipes/pork-adobo.jpg') }}" alt="Pork Adobo" class="food-box-image">
                <h3 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Pork Adobo</h3>
            </div>
        </a>
        <!-- Bicol Express Food Box -->
        <a href="{{ route('bicol.express') }}">
            <div class="food-box">
                <img src="{{ asset('recipes/bcexpress.jpg') }}" alt="Bicol Express" class="food-box-image">
                <h3 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Bicol Express</h3>
            </div>
        </a>
        <!-- Lechon Kawali Food Box -->
        <a href="{{ route('lechon.kawali') }}">
            <div class="food-box">
                <img src="{{ asset('recipes/lechon-kawali.jpg') }}" alt="Lechon Kawali" class="food-box-image">
                <h3 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Lechon Kawali</h3>
            </div>
        </a>
        <!-- New: Pork Sinigang Food Box -->
        <a href="{{ route('pork.sinigang') }}">
            <div class="food-box">
                <img src="{{ asset('recipes/pork-sinigang.jpg') }}" alt="Pork Sinigang" class="food-box-image">
                <h3 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Pork Sinigang</h3>
            </div>
        </a>
    </div>
</div>

<!-- Top Picks Carousel Section -->
<div class="category-box" style="max-width: 100%;">
    <h2 class="category-title" style="font-family: 'Arial', sans-serif; font-size: 28px; font-weight: bold; color: #333; margin-bottom: 10px;">Top Picks</h2>
    <p class="category-description" style="font-family: 'Arial', sans-serif; font-size: 16px; color: #666; margin-bottom: 20px;">Handpicked top-rated dishes, perfect for any meal of the day.</p>
    <div id="topPicksCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <!-- First Carousel Slide (Active) -->
            <div class="carousel-item active">
                <div class="food-container">
                    <!-- Chicken Adobo -->
                    <a href="{{ route('chicken.adobo') }}">
                        <div class="food-box">
                            <img src="{{ asset('recipes/adobo.jpg') }}" alt="Chicken Adobo" class="food-box-image">
                            <h3 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Chicken Adobo</h3>
                        </div>
                    </a>
                    <!-- Pork Adobo -->
                    <a href="{{ route('pork.adobo') }}">
                        <div class="food-box">
                            <img src="{{ asset('recipes/pork-adobo.jpg') }}" alt="Pork Adobo" class="food-box-image">
                            <h3 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Pork Adobo</h3>
                        </div>
                    </a>
                    <!-- Chicken Afritada -->
                    <a href="{{ route('chicken.afritada') }}">
                        <div class="food-box">
                            <img src="{{ asset('recipes/chiafri.jpg') }}" alt="Chicken Afritada" class="food-box-image">
                            <h3 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Chicken Afritada</h3>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Second Carousel Slide -->
            <div class="carousel-item">
                <div class="food-container">
                    <!-- Bicol Express -->
                    <a href="{{ route('bicol.express') }}">
                        <div class="food-box">
                            <img src="{{ asset('recipes/bcexpress.jpg') }}" alt="Bicol Express" class="food-box-image">
                            <h3 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Bicol Express</h3>
                        </div>
                    </a>
                    <!-- Chicken Curry -->
                    <a href="{{ route('chicken.curry') }}">
                        <div class="food-box">
                            <img src="{{ asset('recipes/chicken-curry.jpg') }}" alt="Chicken Curry" class="food-box-image">
                            <h3 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Chicken Curry</h3>
                        </div>
                    </a>
                    <!-- Pork Sinigang -->
                    <a href="{{ route('pork.sinigang') }}">
                        <div class="food-box">
                            <img src="{{ asset('recipes/pork-sinigang.jpg') }}" alt="Pork Sinigang" class="food-box-image">
                            <h3 style="font-family: 'Arial', sans-serif; font-size: 18px; font-weight: bold;">Pork Sinigang</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


        <!-- Carousel Controls -->
        <a class="carousel-control-prev" href="#topPicksCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#topPicksCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>



        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            // JavaScript to show/hide navbar on scroll
            let lastScrollTop = 0;
            const navbar = document.getElementById("navbar");

            window.addEventListener("scroll", function() {
                const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

                if (currentScroll > lastScrollTop) {
                    // Scroll Down
                    navbar.classList.add("navbar-hidden");
                } else {
                    // Scroll Up
                    navbar.classList.remove("navbar-hidden");
                }
                lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
            });
        </script>

    </body>
    </html>
</x-app-layout>
