<main class="container">

    <h1><?= $titlePage; ?></h1>

    <div class="showBook">
        <p><?= $book->getTitle(); ?></p>
        <p><?= $book->getAuthor(); ?></p>
        <p><?= $book->getDescription(); ?></p>


    </div>


</main>