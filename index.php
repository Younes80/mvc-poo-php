<?php

use Controllers\article\ArticleController;

function autoload($class)
{
    require_once "$class.php";
}
spl_autoload_register("autoload");

$articleController = new ArticleController();
$page = $_GET['page'] ?? '';

ob_start();
if (empty($page)) {
    // mettre un chemin dynamique
    header('Location: homepage');
} else {
    if ($page === 'homepage') {
        $articleController->getArticles();
    } elseif ($page === 'add-article') {
        $articleController->addArticle();
    } elseif ($page === 'update-article') {
        $articleController->updateArticle();
    } elseif ($page === 'remove-article') {
        $articleController->removeArticle();
    }
}
$content = ob_get_clean();
require_once './Views/template/template.php';
