<?php

namespace Controllers\article;

use Models\article\ArticleManager;

class ArticleController
{

    private $articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager();
    }

    public function getArticles()
    {
        $articles = $this->articleManager->getArticles();
        // print_r($articles);
        require_once './Views/homepage.php';
    }

    public function addArticle()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';

            $this->articleManager->addArticle($title, $content);
            header('Location: homepage');
        }

        require_once './Views/add-article.php';
    }


    public function removeArticle()
    {
        $id = $_GET['id'] ?? '';
        $this->articleManager->deleteArticle($id);
        header('Location: homepage');
    }


    public function updateArticle()
    {
        $id = $_GET['id'] ?? '';

        if ($id) {
            $article = $this->articleManager->getArticle($id);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';

            $this->articleManager->updateArticle($title, $content, $id);

            header('Location: homepage');
        }

        require_once './Views/update-article.php';
    }
}
