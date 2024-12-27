<?php

function getPosts()
{
    $database = dbConnect();
    $statement = $database->query(
        "SELECT id, title, content, DATE_FORMAT(creationDate, '%d/%m/%Y à %Hh%imin%ss') AS french_creationDate FROM posts ORDER BY creationDate DESC LIMIT 0, 5"
    );
    $posts = [];
    while (($row = $statement->fetch())) {
        $post = [
            'title' => $row['title'],
            'french_creationDate' => $row['french_creationDate'],
            'content' => $row['content'],
            'identifier' => $row['id'],
        ];

        $posts[] = $post;
    }

    return $posts;
}

function getPost($identifier)
{
    $database = dbConnect();
    $statement = $database->prepare(
        "SELECT id, title, content, DATE_FORMAT(creationDate, '%d/%m/%Y à %Hh%imin%ss') AS french_creationDate FROM posts WHERE id = ?"
    );
    $statement->execute([$identifier]);

    $row = $statement->fetch();
    $post = [
        'title' => $row['title'],
        'french_creationDate' => $row['french_creationDate'],
        'content' => $row['content'],
    ];

    return $post;
}

function getComments($identifier)
{
    $database = dbConnect();
    $statement = $database->prepare(
        "SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creationDate FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
    );
    $statement->execute([$identifier]);

    $comments = [];
    while (($row = $statement->fetch())) {
        $comment = [
            'author' => $row['author'],
            'french_creationDate' => $row['french_creationDate'],
            'comment' => $row['comment'],
        ];

        $comments[] = $comment;
    }

    return $comments;
}

function dbConnect()
{
    try {
        $database = new PDO('mysql:host=localhost;dbname=blogoc;charset=utf8', 'root', '');

        return $database;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
