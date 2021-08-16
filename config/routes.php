<?php

return [
    "/" => [
        "controller" => "home.php",
        "action" => "home"
    ],
    "/signup" => [
        "controller" => "User/signup.php",
        "action" => "signup"
    ],
    "/signin" => [
        "controller" => "User/signin.php",
        "action" => "signin"
    ],
    "/logout" => [
        "controller" => "User/logout.php",
        "action" => "logout"
    ],
    "/publicHome" => [
        "controller" => "publicHome.php",
        "action" => "publicHome"
    ],
    "/showFavorites" => [
        "controller" => "showFavorites.php",
        "action" => "showFavorites"

    ],
    "/notFound" => [
        "controller" => "notFound.php",
        "action" => "notFound"

    ],
    "/api/favorites" => [
        "controller" => "Api/showFavorites.php",
        "action" => "showFavorites"

    ],
];
