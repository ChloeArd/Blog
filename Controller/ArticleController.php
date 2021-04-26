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

    public function article($id): Article {
        $manager = new ArticleManager();
        $articles = $manager->getArticle($id);

        $this->render('article.comment', 'Article', [
            'articles' => $articles,
        ]);
        return $articles;
    }

    /**
     * add a new article
     */
    public function addArticle($fields) {
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

    public function updateArticle($fields) {
        if (isset($fields['id'], $fields['title'], $fields['content'], $fields['picture'], $fields['user_fk'])) {
            $userManager = new UserManager();
            $articleManager = new ArticleManager();

            $id = intval($fields['id']);
            $title = htmlentities($fields['title']);
            $content = htmlentities($fields['content']);
            $picture = htmlentities($fields['picture']);
            $user_fk = intval($fields['user_fk']);

            $user_fk = $userManager->getUser($user_fk);
            if ($user_fk->getId()) {
                $article = new Article($id, $title, $content, $picture);
                $articleManager->update($article);
            }
        }

        $this->render('update.article', 'Modifier un article');
    }
}