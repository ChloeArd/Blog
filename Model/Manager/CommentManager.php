<?php

namespace Model\Manager;

use Model\Entity\Article;
use Model\Entity\User;
use Model\Entity\Comment;
use Model\Manager\Traits\ManagerTrait;
use Model\DB;
use Model\User\UserManager;
use Model\Manager\ArticleManager;

class CommentManager {

    use ManagerTrait;


    /**
     * Return all comments
     * @return array
     */
    public function getAll(): array {
        $comments = [];
        $request = DB::getInstance()->prepare("SELECT * FROM comment");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $comment_data) {
                $user = UserManager::getManager()->getUser($comment_data['user_fk']);
                $article = ArticleManager::getManager()->getArticle($comment_data['article_fk']);
                if($user->getId()) {
                    if ($article->getId()) {
                        $comments[] = new Comment($comment_data['id'], $comment_data['title'],  $comment_data['content'], $comment_data['date'], $user, $article);
                    }
                }
            }
        }
        return $comments;
    }

    /**
     * Return a user based on id.
     * @param int $id
     * @return Comment
     */
    public function getComment(int $id): Comment {
        $request = DB::getInstance()->prepare("SELECT * FROM comment WHERE article_fk = :id");
        $request->bindValue(':id', $id);
        $request->execute();
        $comment_data = $request->fetch();
        $comment = new Comment();
        if ($comment_data) {
            $comment->setId($comment_data['id']);
            $comment->setTitle($comment_data['title']);
            $comment->setContent($comment_data['content']);
            $comment->setDate($comment_data['date']);
            $comment->setUserFk($comment_data['user_fk']);
            $comment->setArticleFk($comment_data['article_fk']);
        }
        return $comment;
    }

    /**
     * Add an comment into the database.
     * @param Comment $comment
     * @return bool
     */
    public function add(Comment $comment) {
        $request = DB::getInstance()->prepare("
            INSERT INTO comment (null, title, content, date, user_fk, article_fk)
                VALUES (null, :title, :content, :date, :ufk, artfk) 
        ");

        $request->bindValue(':title', $comment->getTitle());
        $request->bindValue(':content', $comment->getContent());
        $request->bindValue(':date', $comment->getDate());
        $request->bindValue(':ufk', $comment->getUserFk()->getId());
        $request->bindValue(':artfk', $comment->getArticleFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }
}