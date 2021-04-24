<?php
session_start();
$title = "Accueil";

include '_Partials/header.php';
?>

    <main class="flexColumn">
        <img id="imageMarvel" src="https://shopdisneyeu.scene7.com/is/image/DisneyStoreES/hdrm_character-Marvel-Avengers?$mb-c$" alt="marvel">
        <h2 id="presentation">Vous pouvez poster votre Article Marvel en toute facilité !</h2>
        <div id="ArticleHome">
            <a href="articles.view.php?" class="articles flexCenter flexColumn">
                <h2>The Falcon and The Winter Soldier:  The series.</h2>
                <img class="imageArticle" src="https://tse4.mm.bing.net/th?id=OIP.V6V59mxOr1n8QrzCW7kRtwHaD7&pid=Api&P=0&w=313&h=166" alt="test">
            </a>
            <a href="articles.view.php?" class="articles flexCenter flexColumn">
                <h2>The Falcon and The Winter Soldier:  The series.</h2>
                <img class="imageArticle" src="https://tse4.mm.bing.net/th?id=OIP.V6V59mxOr1n8QrzCW7kRtwHaD7&pid=Api&P=0&w=313&h=166" alt="test">
            </a>
            <a href="articles.view.php?" class="articles flexCenter flexColumn">
                <h2>The Falcon and The Winter Soldier:  The series.</h2>
                <img class="imageArticle" src="https://tse4.mm.bing.net/th?id=OIP.V6V59mxOr1n8QrzCW7kRtwHaD7&pid=Api&P=0&w=313&h=166" alt="test">
            </a>
        </div>
    </main>

<?php

include '_Partials/footer.php';