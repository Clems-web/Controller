<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Article.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/UserManager.php';

class ArticleManager {

    // Get all articles
    public function getAllArticle() {
        $article = [];
        $request = DB::getInstance()->prepare("SELECT * FROM articles");
        $result = $request->execute();
        if ($result) {
            $data = $request->fetchAll();
            foreach($data as $article_data) {
                $article[] = new Article($article_data['id'], $article_data['title'], $article_data['content'], $article_data['user_fk']);
            }
        }
        return $article;
    }

    // Get article by id
    public function getById(int $id){
        $article = [];
        $request = DB::getInstance()->prepare("SELECT * FROM articles AS a WHERE a.id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();
        if($result) {
            $article_data = $request->fetch();
            if($article_data) {
                $article = new Article($article_data['id'], $article_data['title'], $article_data['content'], $article_data['user_fk']);
            }
        }
        return $article;
    }

    // Get article by Object User->getId()
    public function getByAuthor(User $user) {
        $article = [];
        $request = DB::getInstance()->prepare("
        SELECT * FROM articles WHERE user_fk = :id
        ");
        $request->bindValue(':id', $user->getId());
        $request->execute();

        if ($request->execute()) {
            $data = $request->fetchAll();
            if ($data) {
                foreach ($data as $article_data) {
                    $article[] = new Article($article_data['id'], $article_data['title'], $article_data['content'], $article_data['user_fk']);
                }
            }
        }
        return $article;
    }

    // If article's Id is null or equal to 0, that's an insert into DB
    public function saveArticle(Article $article) {
        if ($article->getId() === 0 ||$article->getId() == null) {
            $request = DB::getInstance()->prepare("
        INSERT INTO articles(title, content, user_fk) VALUES (:title, :content, :user_fk)
        ");

            $request->bindValue(':title', $article->getTitle());
            $request->bindValue(':content', $article->getContent());
            $request->bindValue(':user_fk', $article->getUserFk());

            $request->execute();

            if ($request) {
                echo "Article saved in DB";
            }
        }

        // Else it's an update of the article
        else {
            $request = DB::getInstance()->prepare("
            UPDATE articles SET title = :title, content = :content, user_fk = :user_fk WHERE id = :id
            ");

            $request->bindValue(':title', $article->getTitle());
            $request->bindValue(':content', $article->getContent());
            $request->bindValue(':user_fk', $article->getUserFk());
            $request->bindValue(':id', $article->getId());

            $request->execute();

            if ($request) {
                echo "Article updated";
            }
        }

    }

    // Deleted article
    public function delArticle(Article $article) {
        $request = DB::getInstance()->prepare("
        DELETE FROM articles WHERE id = :id;
        ");
        $request->bindValue('id', $article->getId());

        $result = $request->execute();
        if ($result) {
            echo "Article supprimé";
        }
    }

}