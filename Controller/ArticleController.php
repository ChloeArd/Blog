<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
use Exception;
use Model\Entity\Article;
use Model\Manager\ArticleManager;
use Model\User\UserManager;
use Model\Entity\User;

class ArticleController {

    use RenderViewTrait;

    /**
     * display the list of article
     */
    public function articles() {
        $manager = new ArticleManager();
        $articles = $manager->getAll();

        $this->render('articles', 'Articles', [
            'articles' => $articles,
        ]);
    }

    public function article($id) {
        $manager = new ArticleManager();
        $article = $manager->getArticle($id);

        $this->render('article.comment', 'Article', [
            'article' => $article,
        ]);
    }

    /**
     * add a new article
     */
    public function addArticle($fields){
        if(isset($fields['title'],$fields['content'], $fields['picture'], $fields['user_fk'])) {
            $userManager = new UserManager();
            $articleManager = new ArticleManager();

            $title = htmlentities($fields['title']);
            $content = htmlentities($fields['content']);
            $picture = htmlentities($fields['picture']);
            $user_fk = intval($fields['user_fk']);

            $user_fk = $userManager->getUser($user_fk);
            if($user_fk->getId()) {
                $article = new Article(null, $title, $content, $picture, $user_fk);
                $articleManager->add($article);
            }
        }

        $this->render('add.article', 'Ajouter un article');
    }
}