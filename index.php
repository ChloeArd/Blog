<?php
session_start();

require_once './Model/DB.php';
require_once './Model/Manager/Traits/ManagerTrait.php';
require_once './Controller/Traits/RenderViewTrait.php';

require_once './Model/Entity/User.php';
require_once './Model/Entity/Article.php';
require_once './Model/Entity/Comment.php';
require_once './Model/Entity/Role.php';

require_once './Model/Manager/ArticleManager.php';
require_once './Model/Manager/UserManager.php';
require_once './Model/Manager/CommentManager.php';

require_once './Controller/HomeController.php';
require_once './Controller/ArticleController.php';
require_once './Controller/CommentController.php';
require_once './Controller/UserController.php';

use Controller\CommentController;
use Controller\HomeController;
use Controller\ArticleController;

// Soit l'url contient le paramètre controller ( $_GET['controller'] => http://localhost?controller=MonSuperController.
if(isset($_GET['controller'])) {
    switch($_GET['controller']) {

        // Affichage de tous les articles.
        case 'articles': // ex: http://localhost?controller=articles
            $controller = new ArticleController();
            $commentController = new CommentController();

            // Pour l'ajout / l'édition / la suppression, on va checker un paramètre 'action' => http://localhost?controller=articles&action=new
            if(isset($_GET['action'])) {
                switch($_GET['action']) {
                    case 'new' :
                        $controller->addArticle($_POST);
                        break;
                    case 'update' :
                        $controller->updateArticle($_POST);
                        break;
                    case 'delete' :
                        $controller->deleteArticle($_POST);
                        break;
                    case 'newComment' :
                        $commentController->addComment($_POST);
                        break;
                    case 'updateComment' :
                        $commentController->updateComment($_POST);
                        break;
                    case 'deleteComment' :
                        $commentController->deleteComment($_POST);
                        break;
                    default:
                        break;
                }
            }
            if (isset($_GET['id'])) {
                $controller->article($_GET["id"]);
            }

            if (isset($_GET['controller2'])) {
                switch ($_GET['controller2']) {
                    case 'comments' :
                        $commentController->commentsArticle($_GET['id']);
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
