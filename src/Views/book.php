<main class="container">
    <h1><?= $titlePage; ?></h1>
    <div class="d-flex justify-content-center my-5">

        <a href='index.php?controller=Book&method=create' class="btn btn-primary ">New Book</a>
    </div>

    <div class="row">
        <div class="d-flex justify-content-center flex-wrap">
            <?php foreach ($books as $book) : ?>
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2 class="card-title"> <?= $book->getTitle() ?> </h2>
                        <h3 class="card-title"> <?= $book->getAuthor() ?> </h3>
                        <h2 class="card-title"> <?= $book->getType() ?> </h2>
                        <p class="card-text"><?= $book->getDescription() ?></p>

                        <div class="d-flex justify-content-center">
                            <a href='index.php?controller=Book&method=showBook&id=<?= $book->getId() ?>' class="btn btn-primary">Détail</a>
                            <a href='index.php?controller=Book&method=edit&id=<?= $book->getId() ?>' class="btn btn-warning">Modifier</a>
                            <a href='index.php?controller=Book&method=delete&id=<?= $book->getId() ?>' class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>

        </div>

        
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if ($currentPage > 1) : ?>
                    <li class="page-item"><a href="index.php?controller=Book&method=index&page=<?= $currentPage - 1  ?>" class="page-link">Précédent</a></li>
                <?php endif;  ?>

                <?php if ($currentPage < $nbrBook) : ?>
                    <li class="page-item"><a href="index.php?controller=Book&method=index&page=<?= $currentPage + 1  ?>" class="page-link">Suivant</a></li>
                <?php endif;  ?>
            </ul>
        </nav>
    </div>

</main>