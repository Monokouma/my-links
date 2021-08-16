<?php 
include "../src/Service/User/allowUser.php";
include  "../src/Service/Favorite/getAllFavorites.php";

function showFavorites() : void {
    $favButton = filter_input(INPUT_GET, "sort");
    allowUser();
    $favorites = getAllFavorites($favButton);
    
    include '../templates/showFavorites.html.php';
}


