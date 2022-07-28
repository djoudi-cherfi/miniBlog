<?php

// Utilisation des variables d'environment
require_once realpath(__DIR__ . "/vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

// Fonction qui récupère les posts
function getAllPost()
{
    $bdd = new PDO('mysql:host='.getenv("HOST").';'.'dbname='.getenv("DB_NAME").'; charset=utf8', getenv("DB_USERNAME"), getenv("DB_PASSWORD"));

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $req = $bdd->query("SELECT id, title, content, create_date FROM post ORDER BY id DESC");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
};

$posts = getAllPost();

?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>miniBlog</title>
</head>

<body>
    <header>
        <h1><a href="index.php">miniBlog®</a></h1>
        <p>Bienvenue sur mon mini blog !</p>
    </header>

    <?php
    // Affichage des posts
    foreach ($posts as $post): ?>
    <h2><?= $post->title ?>
    </h2>
    <p><?= $post->content ?>
    </p>
    <time><?= $post->create_date ?></time>
    <?php endforeach; ?>

    <footer>
        <p>Copyright miniBlog®</p>
    </footer>

</body>

</html>