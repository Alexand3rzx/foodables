<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chicken Fried Rice - FOODABLES</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f5f5f5;
                font-family: 'Arial', sans-serif;
                padding-top: 70px;
            }
            .navbar-custom {
                background-color: #ffa500;
            }
            .navbar-custom .navbar-brand, 
            .navbar-custom .nav-link {
                color: black;
            }
            .navbar-custom .nav-link:hover {
                color: #ff7f00;
            }
            .main-content {
                max-width: 100%;
                margin: 0 auto;
                padding: 20px;
                color: #333;
                display: flex;
                align-items: flex-start;
            }
            .recipe-image {
                width: 320px; 
                height: 392px;
                border-radius: 10px;
                margin-right: 20px; 
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }
            .recipe-details {
                flex: 1; 
            }
            .recipe-title {
                font-size: 3rem;
                color: #333;
                margin-bottom: 20px;
                text-align: left; 
                border-bottom: 2px solid #ffa500;
                padding-bottom: 10px;
            }
            .description, .ingredients, .instructions {
                margin: 30px 0;
                padding: 20px;
                border-radius: 10px;
                background-color: rgba(255, 165, 0, 0.1);
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            h5 {
                margin-top: 10px;
                color: #555;
                font-weight: bold;
            }
            p, ul {
                color: #666;
                line-height: 1.6;
            }
            footer {
                background-color: #ffa500;
                color: white;
                text-align: center;
                padding: 15px 0;
                position: relative;
                bottom: 0;
                width: 100%;
                margin-top: 40px;
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

        <div class="main-content">
            <img src="{{ asset('recipes/chicken-fried-rice.jpg') }}" alt="Chicken Fried Rice" class="recipe-image">
            <div class="recipe-details">
                <h1 class="recipe-title">Chicken Fried Rice</h1>

                <div class="description">
                    <h5>Description:</h5>
                    <p>Chicken Fried Rice is a delicious and quick meal made with stir-fried rice, vegetables, and chicken. It's perfect for using leftover rice!</p>
                </div>
                
                <div class="ingredients">
                    <h5>Ingredients:</h5>
                    <div class="ingredient-list">
                        <div class="ingredient-text">
                            <ul>
                                <li>2 cups Cooked rice</li>
                                <li>1 cup Chicken, cooked and diced</li>
                                <li>1/2 cup Carrots, diced</li>
                                <li>1/2 cup Peas</li>
                                <li>1/4 cup Soy sauce</li>
                                <li>2 eggs, beaten</li>
                                <li>2 tablespoons Green onions, chopped</li>
                                <li>2 tablespoons Cooking oil</li>
                                <li>Salt and pepper to taste</li>
                            </ul>
                        </div>
                        <div class="ingredient-image-container">
                            <img src="{{ asset('recipes/fried_rice_ingredients.jpg') }}" alt="Chicken Fried Rice Ingredients" class="ingredient-image">
                        </div>
                    </div>
                </div>

                <div class="instructions">
                    <h5>Cooking Instructions:</h5>
                    <p>1. Heat oil in a pan over medium heat. Add carrots and peas, and stir-fry for 2 minutes.</p>
                    <p>2. Push vegetables to the side and pour beaten eggs into the pan. Scramble until cooked.</p>
                    <p>3. Add the cooked rice and chicken. Pour soy sauce over the mixture and stir well to combine.</p>
                    <p>4. Cook for another 3-5 minutes, stirring occasionally. Season with salt and pepper to taste.</p>
                    <p>5. Garnish with chopped green onions and serve hot.</p>
                </div>
            </div>
        </div>

        <footer>
            <p>&copy; 2024 FOODABLES. All rights reserved.</p>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.2.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
</x-app-layout>
