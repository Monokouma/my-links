<?php 
include "../src/Service/User/allowUser.php";
include  "../src/Service/Favorite/getAllFavorites.php";

function showFavorites() : void {
    
    allowUser();
    $favButton = filter_input(INPUT_GET, "sort");
    $offset = filter_input(INPUT_GET, "offset");

    if (null === $offset) {
        $offset = 0;
    }
    $favorites = getAllFavorites($favButton, $offset);
    header("Content-Type: application/json");
    echo json_encode($favorites);
}


