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
        </style>
    </head>
    <body>

        <!-- Full-width Navbar with a pint of orange -->
        <nav class="navbar navbar-expand-lg navbar-custom fixed-top navbar-hidden" id="navbar">
            <!-- Brand title -->
            <a class="navbar-brand" href="#">FOODABLES</a>
            
            <!-- Toggler for mobile -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">TOOLS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT</a>
                    </li>
                </ul>

                <!-- Right-side buttons -->
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
                <div class="title">FOODABLES</div>
            </div>

            <!-- Search Bar -->
            <div class="search-bar">
                <input type="text" class="form-control mx-auto" placeholder="Search for a recipe...">
            </div>

            <h2>Welcome to your Dashboard!</h2>
            <p>Here you can manage your recipes and settings.</p>

            <!-- Top Rated Recipes Section in an Orange Container -->
            <div class="top-rated-container">
                <h2 class="section-title">Top Rated Recipes</h2>
                <div class="food-container">
                    @foreach(range(1, 5) as $i) <!-- Adjust the range for top-rated items -->
                    <div class="food-box">
                        <h3>Top Recipe {{ $i }}</h3>
                        <p>Description for Top Rated Recipe {{ $i }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Other Recipes Section -->
            <h2 class="section-title">Other Recipes</h2>
            <div class="food-container">
                @foreach(range(6, 10) as $i) <!-- Adjust the range for other items -->
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
