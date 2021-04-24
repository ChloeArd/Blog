<?php
session_start();
$title = "Accueil";

include '_Partials/header.php';
?>

    <main class="flexColumn">
        <form method="post" action="">
            <h1 class="colorRed">Inscription</h1>
            <label for="usernameRegistration" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="usernameRegistration" name="username" required>
            <label for="emailRegistration" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="emailRegistration" name="email" required>
            <label for="passwordConnection" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="passwordConnection" name="password" required>
            <input type="submit" id="connection" class="btn btn-danger" value="S'inscrire">
        </form>
    </main>

<?php

include '_Partials/footer.php';