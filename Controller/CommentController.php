<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
use Exception;
use Model\Entity\Article;
use Model\Entity\User;
use Model\Entity\Comment;
use Model\Manager\ArticleManager;
use Model\User\UserManager;
use Model\Manager\CommentManager;


class CommentController {

    use RenderViewTrait;

    /**
     * display the list of comment
     */
    public function comments($user_fk, $article_fk) {
        $manager = new CommentManager();
        $comments = $manager->getComment();

        $this->render('article.comment', 'Articles', [
            'comments' => $comments,
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