<div>
    <a href="add-article">Créer un article</a>
</div>

<?php foreach ($articles as $a) : ?>
    <h2><?= $a->title ?></h2>
    <span>Auteur : <?= $a->firstname ?></span>
    <p><?= $a->content ?></p>
    <a href="update-article&id=<?= $a->id ?>">Modifier</a>
    <a href="remove-article&id=<?= $a->id ?>">Supprimer</a>
<?php endforeach; ?>