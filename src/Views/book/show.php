<main class="container">

    <div class="row">
        <div class="col ">
            <h1 class="my-4"><?= $titlePage; ?></h1>

        </div>
    </div>

    <div class="row">
        <div class="col ">
            <a href="index.php?controller=book" class="btn btn-primary mb-5">Retour à la liste des Livres</a>

        </div>
    </div>

    <div class="row">
        <div class="col ">

            <div class="showBook">
                <!--<p>
                        <img src="../../asset/img/<?= $book->getImage() ?>" style="width: 350px;" class="card-img-top img-fluid" alt="..."> 
                </p>-->

                <h2 class="mb-4">Titre : <?= $book->getTitle(); ?></h2>

                <h3>Écrit par : <?= $book->getAuthor(); ?></h3>

                <h4 class="text-muted my-4">Type : <?= $book->getType(); ?></h4>
                <p><?= $book->getDescription(); ?></p>
            </div>

        </div>
    </div>

</main>