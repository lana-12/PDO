<main class="container">
    <h1><?= $titlePage; ?></h1>
    <div class="d-flex justify-content-start my-5">

        <a href='index.php?controller=Book&method=create' class="btn btn-primary ">New Book</a>
    </div>

    <div class="row">
        <div class="col d-flex justify-content-center flex-wrap">
            <?php foreach ($books as $book) : ?>
                <div class="card m-4" style="width: 18rem;">
                    <!--<img src="../../asset/img/<?= $book->getImage() ?>" class="card-img-top img-fluid" alt="..."> -->
                    <div class="card-body">
                        <h2 class="card-title text-center pb-4"> <?= $book->getTitle() ?> </h2>
                        <h3 class="card-title text-muted pb-4"> de <?= $book->getAuthor() ?> </h3>
                        <p class="card-text"><?= $book->getDescription() ?></p>
                        <a href='index.php?controller=Book&method=showBook&id=<?= $book->getId() ?>' class="">Voir le détail...</a>

                        <div class="d-flex justify-content-between  mt-5">
                            <a href='index.php?controller=Book&method=edit&id=<?= $book->getId() ?>' class="btn btn-warning">Modifier</a>
                            <a href='index.php?controller=Book&method=delete&id=<?= $book->getId() ?>' onclick='Supp(this.href); return(false);' class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>

        </div>


    </div>

    <div class="row">
        <div class="col d-flex justify-content-center">
            <nav aria-label="Page navigation ">
                <ul class="pagination">
                    <?php if ($currentPage > 1) : ?>
                        <li class="page-item me-5"><a href="index.php?controller=Book&method=index&page=<?= $currentPage - 1  ?>" class="page-link">Précédent</a></li>
                    <?php endif;  ?>

                    <?php if ($currentPage < $nbrBook) : ?>
                        <li class="page-item"><a href="index.php?controller=Book&method=index&page=<?= $currentPage + 1  ?>" class="page-link">Suivant</a></li>
                    <?php endif;  ?>
                </ul>
            </nav>

        </div>
    </div>

</main>