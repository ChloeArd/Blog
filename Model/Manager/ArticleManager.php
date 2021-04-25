<?php

namespace Model\Manager;

use Model\Entity\Article;
use Model\Entity\User;
use Model\Manager\Traits\ManagerTrait;
use Model\DB;
use Model\User\UserManager;

class ArticleManager {

    use ManagerTrait;

    /**
     * Return all articles
     */
    public function getAll(): array {
        $articles = [];
        $request = DB::getInstance()->prepare("SELECT * FROM article");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $article_data) {
                $user = UserManager::getManager()->getUser($article_data['user_fk']);
                if($user->getId()) {
                    $articles[] = new Article($article_data['id'], $article_data['title'],  $article_data['content'], $article_data['picture'], $user);
                }
            }
        }
        return $articles;
    }

    /**
     * Return a user based on id.
     * @param $id
     * @return Article
     */
    public function getArticle($id): Article {
            $request = DB::getInstance()->prepare("SELECT * FROM article WHERE id = :id");
            $request->bindValue(':id', $id);
            $request->execute();
            $article_data = $request->fetch();
            $article = new Article();
            if ($article_data) {
                $article->setId($article_data['id']);
                $article->setTitle($article_data['title']);
                $article->setContent($article_data['content']);
                $article->setPicture($article_data['picture']);
                $article->setUserFk($article_data['user_fk']);
            }
        return $article;
    }

    /**
     * Add an article into the database.
     * @param Article $article
     * @return bool
     */
    public function add(Article $article) {
        $request = DB::getInstance()->prepare("
            INSERT INTO article (title, content, picture, user_fk)
                VALUES (:title, :content, :picture, :user_fk) 
        ");

        $request->bindValue(':title', $article->getTitle());
        $request->bindValue(':content', $article->getContent());
        $request->bindValue(':picture', $article->getPicture());
        $request->bindValue(':user_fk', $article->getUserFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }
}