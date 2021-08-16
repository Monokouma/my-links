<?php

include_once '../src/Database/getConnexion.php';
include '../src/Service/Favorite/buildFavorite.php';

function addFavorite(array $form): bool
{
    $content = file_get_contents($form["favorite"]["value"]);
    if ($content) {
        $favorite = buildFavorite($form["favorite"]["value"], $content);
        $dbh = getConnexion();
        $sth = $dbh->prepare("INSERT INTO `favorite` (`host`,`href`, `title`, `description`, `favicon`, `preview`) VALUES (:host,:href, :title, :description , :favicon, :preview)");
        $sth->execute([
            ":host" => $favorite['host'],
            "href" => $favorite['href'],
            "title" => $favorite['title'],
            "description" => $favorite['description'],
            ":favicon" => $favorite['favicon'],
            ":preview" => $favorite['preview']
        ]);
        $sth = $dbh->prepare("INSERT INTO `user_favorite` (`user_id`, `favorite_id`) VALUES (:user_id, :favorite_id)");
        $sth->execute([
            "user_id" => $_SESSION["user"]["id"],
            "favorite_id" => $dbh->lastInsertId()
        ]);
        return true;
    }
    return false;
}
