<?php

function getPosts()
{
    // We connect to the database.
    try {
        $database = new PDO('mysql:host=localhost;dbname=blogOC;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // We retrieve the 5 last blog posts.
    $statement = $database->query(
        "SELECT id, title, content, DATE_FORMAT(creationDate, '%d/%m/%Y à %Hh%imin%ss') AS frCreationDate FROM billets ORDER BY creationDate DESC LIMIT 0, 5"
    );
    $posts = [];
    while (($row = $statement->fetch())) {
        $post = [
            'title' => $row['title'],
            'frCreationDate' => $row['frCreationDate'],
            'content' => $row['content'],
        ];

        $posts[] = $post;
    }

    return $posts;
}
