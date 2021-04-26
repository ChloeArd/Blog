<main>
    <?php
    if (isset($var['articles'])) {
        $id = $_GET['id'];
        $manager = new \Model\Manager\ArticleManager();
        $article = $manager->getArticle2($id);

        foreach ($article as $item) {
            if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
                if ($_SESSION["role_fk"] === "1") { ?>
                    <div id="divNew">
                        <a class="colorWhite buttonChange" id="modifyArticle" href="?controller=articles&id=<?= $item->getId() ?>&action=update">Modifier <i class="far fa-edit"></i></a>
                        <a class="colorWhite buttonChange" id="deleteArticle" href="?controller=articles&id=<?= $item->getId() ?>&action=delete">Supprimer <i class="far fa-trash-alt"></i></a>
                    </div>
            <?php
                }
            }
            ?>
            <div id="article" class="flexColumn flexCenter">
                    <h1><?= $item->getTitle()?></h1>
                    <img class="imageArticle" src="<?=$item->getPicture() ?>" alt="test"
                    <p id="content"><?=$item->getContent() ?></p>
            </div>
            <?php
        }
            ?>

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
                    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
                        if ($_SESSION["role_fk"] === "1") {
                            ?>
                            <a class="colorWhite buttonChangeComment" id="modifyComment" href=""><i class="far fa-edit"></i></a>
                            <a class="colorWhite buttonChangeComment" id="deleteComment" href=""><i class="far fa-trash-alt"></i></a>
                        <?php
                        }
                    }
                    ?>
                    <h2 class="titleComment">Titre</h2>
                    <h3 class="pseudoComment">Pseudo - Date</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, corporis, cum deserunt dolor dolores ipsa iure iusto modi neque odit omnis perferendis, provident quam quisquam rem similique unde vero vitae!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi est, ex fugit laborum, laudantium nam perferendis quae quaerat quia quo quos ratione rerum voluptas? Aut delectus dolore esse expedita recusandae!</p>
                </div>
            </div>
    <?php
    }
    ?>
</main>