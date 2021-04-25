<?php

 namespace Model\Entity;

 class Comment {
     private ?int $id;
     private string $title;
     private string $content;
     private string $date;
     private User $user_fk;
     private Article $article_fk;

     public function __construct(string $title, string $content, string $date, User $user_fk, Article $article_fk, int $id= null) {
         $this->id = $id;
         $this->title = $title;
         $this->content = $content;
         $this->date = $date;
         $this->user_fk = $user_fk;
         $this->article_fk = $article_fk;
     }

     /**
      * @return int|null
      */
     public function getId(): ?int {
         return $this->id;
     }

     /**
      * @param int|null $id
      */
     public function setId(?int $id): void {
         $this->id = $id;
     }

     /**
      * @return string
      */
     public function getTitle(): string {
         return $this->title;
     }

     /**
      * @param string $title
      */
     public function setTitle(string $title): void {
         $this->title = $title;
     }

     /**
      * @return string
      */
     public function getContent(): string {
         return $this->content;
     }

     /**
      * @param string $content
      */
     public function setContent(string $content): void {
         $this->content = $content;
     }

     /**
      * @return string
      */
     public function getDate(): string {
         return $this->date;
     }

     /**
      * @param string $date
      */
     public function setDate(string $date): void {
         $this->date = $date;
     }

     /**
      * @return User
      */
     public function getUserFk(): User {
         return $this->user_fk;
     }

     /**
      * @param User $user_fk
      */
     public function setUserFk(User $user_fk): void {
         $this->user_fk = $user_fk;
     }

     /**
      * @return Article
      */
     public function getArticleFk(): Article {
         return $this->article_fk;
     }

     /**
      * @param Article $article_fk
      */
     public function setArticleFk(Article $article_fk): void {
         $this->article_fk = $article_fk;
     }
 }