<main class="container">

    <form action="index.php?controller=Book&method=edit&id=<?= $book->getId() ?>" method="POST">

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" value="<?= $book->getTitle() ?>">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" aria-describedby="authorHelp" value="<?= $book->getAuthor() ?>">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control" id="type" name="type" aria-describedby="typeHelp" value="<?= $book->getType() ?>">
        </div>

        <div class="form-floating">
            <textarea class="form-control" name="description" id="description"><?= $book->getDescription() ?></textarea>
            <label for="description">Description</label>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>


</main>