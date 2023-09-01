<main class="container">

    <form action="index.php?controller=Book&method=create" method="POST">

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" aria-describedby="authorHelp">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control" id="type" name="type" aria-describedby="typeRHelp">
        </div>

        <div class="mb-3">
            <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
            <label for="description"></label>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>


</main>