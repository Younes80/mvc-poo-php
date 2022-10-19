<?php

namespace Models\article;

use Models\Database;

class ArticleManager extends Database
{

    public function getArticles()
    {

        $req = 'SELECT posts.*, user.firstname 
                    FROM posts
                    INNER JOIN user 
                    ON posts.iduser = user.id';

        $statement = $this->getBdd()->prepare($req);
        $statement->execute();
        $articles = $statement->fetchAll();
        $statement->closeCursor();
        return $articles;
    }


    public function getArticle($id)
    {
        $req = "SELECT * FROM posts WHERE id = $id";

        $statement = $this->getBdd()->prepare($req);
        $statement->execute();
        $article = $statement->fetch();
        $statement->closeCursor();
        return $article;
    }


    public function addArticle($title, $content)
    {
        $req = "INSERT INTO posts (title, content, iduser) VALUES (:title, :content, :iduser)";

        $statement = $this->getBdd()->prepare($req);

        $statement->bindValue(':title', $title);
        $statement->bindValue(':content', $content);
        $statement->bindValue(':iduser', 4);

        $statement->execute();
    }


    public function updateArticle($title, $content, $id)
    {

        $req = "UPDATE posts
                SET
                    title = :title,
                    content = :content,
                    iduser = :iduser
                WHERE id = :id";

        $statementUpdate = $this->getBdd()->prepare($req);

        $statementUpdate->bindValue(':title', $title);
        $statementUpdate->bindValue(':content', $content);
        $statementUpdate->bindValue(':iduser', 4);
        $statementUpdate->bindValue(':id', $id);

        $statementUpdate->execute();
    }


    public function deleteArticle($id)
    {

        $req = "DELETE FROM posts WHERE id = $id";
        $statement = $this->getBdd()->prepare($req);
        $statement->execute();
    }
}
