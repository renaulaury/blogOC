<?php

require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');

if (isset($_GET['action']) && ($_GET['action'] !== '')) {
    if ($_GET['action'] === 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $identifier = $_GET['id'];

            post($identifier);
        } else {
            echo 'Error';
            die;
        }
    } else {
        echo 'Erreur 404';
    }
} else {
    homepage();
}
