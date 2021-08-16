<?php

include_once '../src/Database/getConnexion.php';
include_once '../src/Service/Favorite/buildPreview.php';


function getAllFavorites($favButton, $offset = 0): array
{
    
    
    $dbh = getConnexion();
     if ($favButton == "newest") {
        $sth = $dbh->prepare("SELECT id, href, title, description FROM favorite GROUP BY href ORDER BY id DESC LIMIT 8 OFFSET $offset");
     } elseif ($favButton == "oldest"  || $favButton == null) {
        $sth = $dbh->prepare("SELECT id, href, title, description FROM favorite GROUP BY href ORDER BY id ASC LIMIT 8 OFFSET $offset");
    }
    $sth->execute();
    $favorites = $sth->fetchAll(PDO::FETCH_ASSOC);
    
    

    foreach ($favorites as &$favorite) {
        $slashExplode = explode("/", $favorite["href"]);
        $host = $slashExplode[2];
        $favorite["favicon"] = $slashExplode[0] . "//" . $host . "/favicon.ico";
        $favorite["preview"] = buildPreview($host, $favorite["href"]);
    }
    return $favorites;
}
