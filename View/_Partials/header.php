<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/351e9300a0.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>

    <header class="flexRow align">
        <h1>Marvel-Blog</h1>
        <a id="home" class="menu" href="../View/home.view.php">Accueil</a>
        <a class="menu" href="../View/articles.view.php">Blog</a>
        <?php
        if (isset($_SESSION["id"])) {
        ?>
            <p class="menu" id="pseudo"><i class="fas fa-user-circle"></i><?= $_SESSION["pseudo"]?></p>
            <a class="menu colorRed" href="../../assets/php/disconnection.php">Déconnexion</a>
        <?php
        }
        else {
        ?>
            <a class="menu" href="../../View/connection.php">Connexion</a>
            <a class="menu" href="../../View/registration.php">Inscription</a>
        <?php
        }
        ?>
    </header>
