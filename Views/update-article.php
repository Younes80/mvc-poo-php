<form action="update-article&id=<?= $id ?>" method="post">
    <input type="text" name="title" placeholder="Titre" value="<?= $article->title ?? "" ?>">
    <textarea name="content" placeholder="Description">
            <?= $article->content ?? '' ?>
        </textarea>
    <button type="submit">Valider</button>
</form>