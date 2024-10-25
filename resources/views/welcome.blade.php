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

        .category-container {
        background-color: rgba(255, 165, 0, 0.2); /* Transparent orange */
        padding: 40px;
        border-radius: 15px;
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

.recipe-card img {
    width: 100%;
    border-radius: 10px;
}

.recipe-card h3 {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 15px;
}

.recipe-card p {
    font-size: 1rem;
    color: #555;
    margin-bottom: 20px;
}

.recipe-card h4 {
    font-size: 1.2rem;
    margin-top: 20px;
    color: #333;
}

.recipe-card ul, .recipe-card ol {
    margin-left: 20px;
}

.recipe-card ul li, .recipe-card ol li {
    font-size: 1rem;
    color: #555;
}

.modal-body {
    display: flex;
    align-items: center; /* Center the content vertically */
}

.modal-body img {
    width: 100%; /* Make the image responsive */
    max-height: 300px; /* Set a max height to maintain a rectangular shape */
    object-fit: cover; /* Ensure the image covers the area without distortion */
}

.sign-in-reminder-container {
    background-color: rgba(255, 165, 0, 0.1); /* Light transparent orange */
    border-radius: 15px;
    padding: 20px;
    margin: 20px auto;
    max-width: 600px; /* Set a max-width for better centering */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.reminder-logo {
    width: 80px; /* Adjust size as needed */
}

.sign-in-reminder {
    margin: 30px 0;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.sign-in-reminder h3 {
    margin-bottom: 15px;
}

.sign-in-reminder .btn {
    font-size: 16px;
}

.btn-orange {
    background-color: orange; /* Set the background color to orange */
    color: black; /* Change text color to white for contrast */
    border: none; /* Remove border */
}

.btn-orange:hover {
    background-color: darkorange; /* Darker orange on hover */
}

    </style>
</head>
<body>

    <!-- Full-width Navbar with a pint of orange -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <!-- Brand title -->
        <img src="{{ asset('logos/whitewc.jpg') }}" alt="FOODABLES Logo" style="height: 40px;">
        
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
        <!-- First carousel item: Welcome message -->
        <div class="carousel-item active">
            <img src="{{ asset('logos/foodz.jpg') }}" class="d-block w-100" alt="Welcome" style="object-fit: cover; height: 500px;">
            <div class="carousel-caption custom-caption">
                <h1>Welcome to FOODABLES</h1>
                <p>Your go-to Filipino recipe hub! Discover, cook, and enjoy a variety of traditional and modern Filipino dishes.</p>
            </div>
        </div>

        <!-- Second carousel item: Adobo recipe -->
        <div class="carousel-item">
            <img src="{{ asset('recipes/adobo.jpg') }}" class="d-block w-100" alt="Adobo Recipe">
            <div class="carousel-caption custom-caption">
                <h5>Chicken Adobo</h5>
                <p>Chicken Adobo is an example of a famous adobo version that is gaining popularity around the world.</p>
            </div>
        </div>

        <!-- Third carousel item: Pork Adobo -->
        <div class="carousel-item">
            <img src="{{ asset('recipes/adobopork.jpg') }}" class="d-block w-100" alt="Pork Adobo">
            <div class="carousel-caption custom-caption">
                <h5>Pork Adobo</h5>
                <p>Considered by some as the pride of Filipino cuisine, Pork Adobo is definitely a favorite among many around the world.</p>
            </div>
        </div>

        <!-- Fourth carousel item: Bicol Express -->
        <div class="carousel-item">
            <img src="{{ asset('recipes/bcexpress.jpg') }}" class="d-block w-100" alt="Bicol Express">
            <div class="carousel-caption custom-caption">
                <h5>Bicol Express</h5>
                <p>Bicol Express, in all of its well-balanced spice and sweetness, also makes for an irresistible cold day meal.</p>
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

        

       <!-- Chicken Recipes Section -->
<div class="category-box">
    <h2 class="category-title">Chicken Recipes</h2>
    <div class="food-container">
        <!-- Chicken Adobo Food Box -->
        <div class="food-box" data-toggle="modal" data-target="#recipeModalAdobo">
            <img src="{{ asset('recipes/adobo.jpg') }}" alt="Chicken Adobo" class="food-box-image">
            <h3>Chicken Adobo</h3>
        </div>

        <!-- Chicken Fried Rice Food Box -->
<div class="food-box" data-toggle="modal" data-target="#recipeModalFriedRice">
    <img src="{{ asset('recipes/chicken-fried-rice.jpg') }}" alt="Chicken Fried Rice" class="food-box-image">
    <h3>Chicken Fried Rice</h3>
</div>


        <!-- Chicken Afritada Food Box -->
        <div class="food-box" data-toggle="modal" data-target="#recipeModalAfritada">
            <img src="{{ asset('recipes/chiafri.jpg') }}" alt="Chicken Afritada" class="food-box-image">
            <h3>Chicken Afritada</h3>
        </div>
    </div>
</div>





<!-- Modal for Chicken Adobo Recipe -->
<div class="modal fade" id="recipeModalAdobo" tabindex="-1" aria-labelledby="recipeModalAdoboLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recipeModalAdoboLabel">Chicken Adobo Recipe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Image Column -->
                    <div class="col-md-6">
                        <img src="{{ asset('recipes/adobo.jpg') }}" alt="Chicken Adobo" class="img-fluid rounded">
                    </div>
                    <!-- Recipe Details Column -->
                    <div class="col-md-6">
                        <h3>Chicken Adobo</h3>
                        <p>
                            Chicken Adobo is a savory and tangy dish made with chicken, soy sauce, vinegar, garlic, and bay leaves. 
                            It is one of the most famous Filipino dishes, known for its delicious balance of flavors.
                        </p>
                        <h4>Ingredients:</h4>
                        <ul>
                            <li>1 kg chicken</li>
                            <li>1/2 cup soy sauce</li>
                            <li>1/4 cup vinegar</li>
                            <li>4 cloves garlic, minced</li>
                            <li>2 bay leaves</li>
                            <li>1 tsp black peppercorns</li>
                            <li>1 cup water</li>
                        </ul>
                        <h4>Instructions:</h4>
                        <ol>
                            <li>Marinate chicken in soy sauce and garlic for at least 30 minutes.</li>
                            <li>Heat oil in a pan and fry the marinated chicken until browned.</li>
                            <li>Add vinegar, bay leaves, and peppercorns. Simmer for 30 minutes.</li>
                            <li>Add water and continue to cook until chicken is tender.</li>
                            <li>Serve with rice and enjoy!</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal for Chicken Afritada Recipe -->
<div class="modal fade" id="recipeModalAfritada" tabindex="-1" aria-labelledby="recipeModalAfritadaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recipeModalAfritadaLabel">Chicken Afritada Recipe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Image Column -->
                    <div class="col-md-6">
                        <img src="{{ asset('recipes/chiafri.jpg') }}" alt="Chicken Afritada" class="img-fluid rounded">
                    </div>
                    <!-- Recipe Details Column -->
                    <div class="col-md-6">
                        <h3>Chicken Afritada</h3>
                        <p>
                            Chicken Afritada is a Filipino chicken stew made with a tomato-based sauce, vegetables, and spices. 
                            It's a comforting dish perfect for family meals.
                        </p>
                        <h4>Ingredients:</h4>
                        <ul>
                            <li>1 kg chicken, cut into pieces</li>
                            <li>2 cups tomato sauce</li>
                            <li>1 cup potatoes, diced</li>
                            <li>1 cup carrots, sliced</li>
                            <li>1 cup bell peppers, sliced</li>
                            <li>1 onion, chopped</li>
                            <li>4 cloves garlic, minced</li>
                            <li>1 cup water</li>
                            <li>Salt and pepper to taste</li>
                        </ul>
                        <h4>Instructions:</h4>
                        <ol>
                            <li>Heat oil in a pan and sauté garlic and onion until fragrant.</li>
                            <li>Add chicken and cook until browned.</li>
                            <li>Stir in tomato sauce, water, and bring to a boil.</li>
                            <li>Add potatoes, carrots, and bell peppers. Simmer until vegetables are tender.</li>
                            <li>Season with salt and pepper. Serve hot with rice.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Chicken Fried Rice Recipe -->
<div class="modal fade" id="recipeModalFriedRice" tabindex="-1" aria-labelledby="recipeModalFriedRiceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recipeModalFriedRiceLabel">Chicken Fried Rice Recipe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Image Column -->
                    <div class="col-md-6">
                        <img src="{{ asset('recipes/chicken-fried-rice.jpg') }}" alt="Chicken Fried Rice" class="img-fluid rounded">
                    </div>
                    <!-- Recipe Details Column -->
                    <div class="col-md-6">
                        <h3>Chicken Fried Rice</h3>
                        <p>
                            Chicken Fried Rice is a quick and easy dish made with leftover rice, chicken, vegetables, and a hint of soy sauce. 
                            It's a popular choice for a satisfying meal.
                        </p>
                        <h4>Ingredients:</h4>
                        <ul>
                            <li>2 cups cooked rice</li>
                            <li>1 cup cooked chicken, shredded</li>
                            <li>1 cup mixed vegetables (carrots, peas, corn)</li>
                            <li>2 eggs, beaten</li>
                            <li>3 tablespoons soy sauce</li>
                            <li>2 green onions, chopped</li>
                            <li>Salt and pepper to taste</li>
                        </ul>
                        <h4>Instructions:</h4>
                        <ol>
                            <li>Heat oil in a pan and scramble the eggs. Set aside.</li>
                            <li>Add vegetables and stir-fry until tender.</li>
                            <li>Add cooked rice and chicken, and mix well.</li>
                            <li>Add soy sauce, scrambled eggs, and green onions. Stir-fry for a few minutes.</li>
                            <li>Season with salt and pepper to taste. Serve hot!</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Pork Recipes Section -->
<div class="category-box">
    <h2 class="category-title">Pork Recipes</h2>
    <div class="food-container">
        <!-- Pork Adobo Food Box -->
        <div class="food-box" data-toggle="modal" data-target="#recipeModalPorkAdobo">
            <img src="{{ asset('recipes/adobopork.jpg') }}" alt="Pork Adobo" class="food-box-image">
            <h3>Pork Adobo</h3>
        </div>

        <!-- Pork Chop Steak Food Box -->
<div class="food-box" data-toggle="modal" data-target="#recipeModalPorkChopSteak">
    <img src="{{ asset('recipes/porksteak.jpg') }}" alt="Pork Chop Steak" class="food-box-image">
    <h3>Pork Chop Steak</h3>
</div>
        
        <!-- Bicol Express Food Box -->
        <div class="food-box" data-toggle="modal" data-target="#recipeModalBicolExpress">
            <img src="{{ asset('recipes/bcexpress.jpg') }}" alt="Bicol Express" class="food-box-image">
            <h3>Bicol Express</h3>
        </div>
    </div>
</div>

<!-- Modal for Pork Adobo Recipe -->
<div class="modal fade" id="recipeModalPorkAdobo" tabindex="-1" aria-labelledby="recipeModalPorkAdoboLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recipeModalPorkAdoboLabel">Pork Adobo Recipe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Image Column -->
                    <div class="col-md-6">
                        <img src="{{ asset('recipes/adobopork.jpg') }}" alt="Pork Adobo" class="img-fluid rounded">
                    </div>
                    <!-- Recipe Details Column -->
                    <div class="col-md-6">
                        <h3>Pork Adobo</h3>
                        <p>
                            Pork Adobo is a popular Filipino dish known for its rich, savory flavor. It's made by marinating pork in vinegar, soy sauce, garlic, and spices.
                        </p>
                        <h4>Ingredients:</h4>
                        <ul>
                            <li>1 kg pork belly, cut into chunks</li>
                            <li>1/2 cup soy sauce</li>
                            <li>1/2 cup vinegar</li>
                            <li>4 cloves garlic, minced</li>
                            <li>2 bay leaves</li>
                            <li>1 tsp black peppercorns</li>
                            <li>1 cup water</li>
                        </ul>
                        <h4>Instructions:</h4>
                        <ol>
                            <li>Marinate pork in soy sauce, garlic, and bay leaves for at least 30 minutes.</li>
                            <li>In a pot, combine pork with marinade and add vinegar. Do not stir.</li>
                            <li>Simmer for about 20 minutes, then add water and let it cook until tender.</li>
                            <li>Serve with rice and enjoy!</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Bicol Express Recipe -->
<div class="modal fade" id="recipeModalBicolExpress" tabindex="-1" aria-labelledby="recipeModalBicolExpressLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recipeModalBicolExpressLabel">Bicol Express Recipe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Image Column -->
                    <div class="col-md-6">
                        <img src="{{ asset('recipes/bcexpress.jpg') }}" alt="Bicol Express" class="img-fluid rounded">
                    </div>
                    <!-- Recipe Details Column -->
                    <div class="col-md-6">
                        <h3>Bicol Express</h3>
                        <p>
                            Bicol Express is a spicy Filipino dish made from pork, coconut milk, shrimp paste, and chili peppers. It's a must-try for spice lovers!
                        </p>
                        <h4>Ingredients:</h4>
                        <ul>
                            <li>500g pork belly, sliced</li>
                            <li>1 cup coconut milk</li>
                            <li>2 tbsp shrimp paste</li>
                            <li>3-5 green chili peppers</li>
                            <li>1 onion, chopped</li>
                            <li>4 cloves garlic, minced</li>
                            <li>Salt and pepper to taste</li>
                        </ul>
                        <h4>Instructions:</h4>
                        <ol>
                            <li>In a pan, sauté garlic and onion until fragrant.</li>
                            <li>Add pork and cook until browned.</li>
                            <li>Pour in coconut milk and add shrimp paste. Stir well.</li>
                            <li>Add chili peppers and let simmer until pork is tender.</li>
                            <li>Season with salt and pepper. Serve with rice.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Pork Chop Steak Recipe -->
<div class="modal fade" id="recipeModalPorkChopSteak" tabindex="-1" aria-labelledby="recipeModalPorkChopSteakLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recipeModalPorkChopSteakLabel">Pork Chop Steak Recipe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Image Column -->
                    <div class="col-md-6">
                        <img src="{{ asset('recipes/porksteak.jpg') }}" alt="Pork Chop Steak" class="img-fluid rounded">
                    </div>
                    <!-- Recipe Details Column -->
                    <div class="col-md-6">
                        <h3>Pork Chop Steak</h3>
                        <p>
                            Pork Chop Steak is a hearty dish that's marinated and grilled or pan-fried to perfection, making it juicy and flavorful.
                        </p>
                        <h4>Ingredients:</h4>
                        <ul>
                            <li>4 pork chops</li>
                            <li>1/4 cup soy sauce</li>
                            <li>2 tbsp olive oil</li>
                            <li>3 cloves garlic, minced</li>
                            <li>1 tsp black pepper</li>
                            <li>1 tsp salt</li>
                            <li>1 tsp paprika</li>
                            <li>1 tbsp lemon juice</li>
                        </ul>
                        <h4>Instructions:</h4>
                        <ol>
                            <li>In a bowl, mix soy sauce, olive oil, garlic, pepper, salt, paprika, and lemon juice.</li>
                            <li>Marinate pork chops in the mixture for at least 30 minutes.</li>
                            <li>Heat a grill or pan over medium heat and cook pork chops for about 6-8 minutes on each side, or until fully cooked.</li>
                            <li>Serve hot with your favorite sides.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Sign-In Reminder Section -->
<div class="sign-in-reminder-container text-center my-5">
    <div class="sign-in-reminder">
        <img src="{{ asset('logos/welcome.jpg') }}" alt="FOODABLES Logo" class="reminder-logo mb-3" style="max-width: 100px;">
        <h3>Sign in to Access More Features!</h3>
        <p>Join us to unlock exclusive recipes and features on FOODABLES.</p>
        <a href="{{ route('login') }}" class="btn btn-orange">Login</a>
    </div>
</div>



    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
