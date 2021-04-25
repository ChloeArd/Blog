<?php
session_start();
$title = "Titre de l'article ici";


include '_Partials/header.php';
?>

    <main>

        <?php
        if ($_SESSION["role_fk"] === "1") {
            ?>
            <div id="divNew">
                <a class="colorWhite buttonChange" id="modifyArticle" href="">Modifier <i class="far fa-edit"></i></a>
                <a class="colorWhite buttonChange" id="deleteArticle" href="">Supprimer <i class="far fa-trash-alt"></i></a>
            </div>
        <?php
        }
        ?>

        <div id="article" class="flexColumn flexCenter">
            <h1>The Falcon and The Winter Soldier: The series.</h1>
            <img class="imageArticle" src="https://tse4.mm.bing.net/th?id=OIP.V6V59mxOr1n8QrzCW7kRtwHaD7&pid=Api&P=0&w=313&h=166" alt="test"
            <p id="content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam beatae cupiditate delectus deleniti eius ipsam, modi nobis non porro quisquam reprehenderit rerum sequi soluta ut vitae. A ea esse rem?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt ducimus ex impedit saepe unde! Accusamus aliquid amet blanditiis dolores earum excepturi fuga laboriosam, nulla omnis quo ratione rem tempore totam.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cum, debitis deserunt dolore dolores impedit mollitia nam necessitatibus optio, perspiciatis porro repudiandae sit ullam. Ab dolorum harum ipsam sunt vel.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta doloribus eligendi, eos exercitationem non veniam! Aliquid commodi in modi molestias mollitia, neque non quaerat quos tempora voluptatem. Delectus, ex?
            </p>
        </div>

        <div class="horizontalLine"></div>

        <div id="formComment">
            <form id="formComment" class="width_80" action="" method="post">
                <h2 class="colorRed">Poster un commentaire</h2>
                <label for="title" class="form-label">Titre du commentaire</label>
                <input type="text" class="form-control" id="title" name="title" required>
                <label for="comment" class="form-label">Commentaire</label>
                <textarea id="comment" class="form-control" name="comment" required></textarea>
                <input hidden  type="text" id="inputDate" value="<?= date('Y-m-d H:i:s')?>">
                <input hidden  type="text" id="inputDate" value="<?= "mettre l'id de la personne pour recup pseudo pour afficher"?>">
                <input type="submit" id="submit" class="btn btn-danger" value="Ajouter le commentaire">
            </form>
        </div>

        <div class="horizontalLine"></div>

        <div id="comments" class="width_80">
            <h2 class="colorRed">Commentaires</h2>
            <div class="commentArticle">
                <?php
                if ($_SESSION["role_fk"] === "1") {
                    ?>
                    <a class="colorWhite buttonChangeComment" id="modifyComment" href=""><i class="far fa-edit"></i></a>
                    <a class="colorWhite buttonChangeComment" id="deleteComment" href=""><i class="far fa-trash-alt"></i></a>
                <?php
                }
                ?>
                <h2 class="titleComment">Titre</h2>
                <h3 class="pseudoComment">Pseudo - Date</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, corporis, cum deserunt dolor dolores ipsa iure iusto modi neque odit omnis perferendis, provident quam quisquam rem similique unde vero vitae!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi est, ex fugit laborum, laudantium nam perferendis quae quaerat quia quo quos ratione rerum voluptas? Aut delectus dolore esse expedita recusandae!</p>
            </div>

        </div>
    </main>

<?php

include '_Partials/footer.php';