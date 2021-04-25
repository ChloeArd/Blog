<?php
session_start();
$title = "Ajouter un article";

include '_Partials/header.php';
?>

    <main>
        <form class="width_80" method="post" action="">
            <h1 class="colorRed">Ajouter un article</h1>
            <label for="title" class="form-label">Titre de l'article</label>
            <input type="text" class="form-control" id="title" name="title" required>
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="title" accept="image/png, image/jpeg" required>
            <label for="contentArticle" class="form-label">Contenu de l'article</label>
            <textarea id="contentArticle" class="form-control" name="content" required></textarea>
            <input type="submit" id="submit" class="btn btn-danger" value="Ajouter l'article">
        </form>
    </main>

<?php

include '_Partials/footer.php';