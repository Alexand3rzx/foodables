<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About FOODABLES</title>
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

            /* About section styling */
            .about-container {
                background-color: white;
                padding: 30px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 15px;
                max-width: 900px;
                margin: 40px auto;
            }

            .about-title {
                font-size: 2.5rem;
                margin-bottom: 20px;
                color: black;
            }

            .about-content {
                font-size: 1.2rem;
                line-height: 1.6;
                color: #333;
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
        <!-- Logo in the center -->
        <div class="title-container">
            <img src="{{ asset('logos/welcome.jpg') }}" alt="FOODABLES Logo" class="logo" style="max-width: 200px;">
        </div>

        <!-- About Section -->
        <div class="about-container">
            <h2 class="about-title">About FOODABLES</h2>
            <p class="about-content">
                Welcome to <strong>FOODABLES</strong>, your go-to recipe viewing website where Filipino cuisine takes center stage. 
                Whether you're a seasoned cook or just getting started, FOODABLES is designed for everyone who loves the unique 
                flavors of Filipino food. Here, you can explore a wide variety of traditional and modern dishes, from classic Chicken Adobo to 
                innovative takes on beloved favorites. Our platform allows users to create shopping lists, 
                and explore meal inspiration with ease. Join our community of food lovers and start your culinary adventure with FOODABLES today!
            </p>
        </div>
    </div>

    </body>
    </html>
</x-app-layout>
