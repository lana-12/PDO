<?php


?>

<main class="container">
    <h1><?= $titlePage; ?></h1>
    <a href='index.php?controller=Book&method=create' class="btn btn-primary">New Book</a>


    <?php
    foreach ($books as $book) :



    ?>

        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h2 class="card-title"> <?= $book->getTitle() ?> </h2>
                <h3 class="card-title"> <?= $book->getAuthor() ?> </h3>
                <h2 class="card-title"> <?= $book->getType() ?> </h2>
                <p class="card-text"><?= $book->getDescription() ?></p>
                <a href='index.php?controller=Book&method=showBook&id=<?= $book->getId() ?>' class="btn btn-primary">Détail</a>
                <a href='index.php?controller=Book&method=edit&id=<?= $book->getId() ?>' class="btn btn-warning">Modifier</a>
                <a href='index.php?controller=Book&method=delete&id=<?= $book->getId() ?>' class="btn btn-danger">Supprimer</a>
            </div>
        </div>

    <?php endforeach ?>

</main>