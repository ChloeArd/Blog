<?php
session_start();
$title = "Accueil";

include $_SERVER["DOCUMENT_ROOT"]. "/View/_Partials/header.php";

require_once './Model/DB.php';
//require_once './Model/Manager/Traits/ManagerTrait.php';
//require_once './Controller/Traits/RenderViewTrait.php';

require_once './Model/Entity/User.php';
require_once './Model/Entity/Article.php';

require_once './Model/Manager/ArticleManager.php';
require_once './Model/Manager/UserManager.php';

require_once './Controller/HomeController.php';
require_once './Controller/ArticleController.php';

use Controller\HomeController;
use Controller\ArticleController;

// Soit l'url contient le paramètre controller ( $_GET['controller'] => http://localhost?controller=MonSuperController.
if(isset($_GET['controller'])) {

    // Alors, l'utilisateur demande une action à effectuer.
    switch($_GET['controller']) {

        // Affichage de tous les articles.
        case 'articles': // ex: http://localhost?controller=articles
            $controller = new ArticleController();

            // Pour l'ajout / l'édition / la suppression, on va checker un paramètre 'action' => http://localhost?controller=articles&action=new
            if(isset($_GET['action'])) {
                switch($_GET['action']) {
                    case 'new' :
                        $controller->addArticle($_POST);
                        break;
                    default:
                        break;
                }
            }
            else {
                $controller->articles();
            }

            break;

        default:
            // Éventuellement, afficher une page 404 not found. Car le controller n'existe pas !
            break;
    }
}
else {
    // Si le paramètre cxontroller ne se trouve pas dans l'url, alors la page 'home' doit être affichée.
    // Donc on part sur le Home controller en demandant d'afficher la home page.
    $controller = new HomeController();
    $controller->homePage();
}

include $_SERVER["DOCUMENT_ROOT"] . "/View/_Partials/footer.php";