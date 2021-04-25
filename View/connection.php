<?php
session_start();
$title = "Connexion";

include '_Partials/header.php';
?>
    <main class="flexColumn">
        <form method="post" action="../assets/php/connection.php" >
            <h1 class="colorRed">Connexion</h1>
            <label for="emailConnection" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailConnection" name="email" required>
            <label for="passwordConnection" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="passwordConnection" name="password" required>
            <input type="submit" id="submit" class="btn btn-danger" value="Se connecter">
        </form>
    </main>
<?php

include '_Partials/footer.php';