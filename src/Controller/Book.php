<?php

namespace Vivi\PDO\Controller;

use Vivi\PDO\Entity\Books;
use Vivi\PDO\Kernel\Views;
use Vivi\PDO\Utils\MyFunction;
use Vivi\PDO\Kernel\AbstractController;

class Book extends AbstractController{

    public function index()
    {
        $view = new Views();
        $books = Books::getAll();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('book.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page BookController',
            'books'=> $books,
        ]);
    }

    public function showBook()
    {
        $view = new Views();
        $id = $_GET['id'];
        $book = Books::getById($id);
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('show.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page ShowBookController',
            'book' => $book,
        ]);
    }
    public function create()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['title']) && $_POST['title'] !== "") {
                if (isset($_POST['author']) && $_POST['author'] !== "") {
                    if (isset($_POST['type']) && $_POST['type'] !== "") {
                        if (isset($_POST['description']) && $_POST['description'] !== "") {

                            $result = false;
                            $result = Books::create([
                                'title' => $_POST['title'],
                                'author' => $_POST['author'],
                                'type' => $_POST['type'],
                                'description' => $_POST['description'],
                            ]);

                            if ($result) {
                                $this->setFlashMessage("Le livre a été bien créé", "success");
                            }
                        }
                    }
                }
            }
        }

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('createBook.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page BookController',
        ]);
    }

    public function delete()
    {
        $result = false;
        $this->setFlashMessage('Aucun livre ne correspond', 'error');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = Books::delete($id);
        }
        if ($result) {
            $this->setFlashMessage("Le livre a bien été supprimé", "success");
        }
        $this->index();
        
    }

    public function edit()
    {
        $id = $_GET['id'];
        $book = Books::getById($id);
        // Vérifie si un livre avec $id existe sinon je le redirige vers controller=book + method=index
        if (!$book) {

            http_response_code(404);

            //Redirection vers controller de mon choix, ici c'est Controller/Book.php
            header('Location: /?controller=book');
        }

        if (isset($_POST['submit'])) {
            if (isset($_POST['title']) && $_POST['title'] !== "") {
                    if (isset($_POST['author']) && $_POST['author'] !== "") {
                            if (isset($_POST['type']) && $_POST['type'] !== "") {
                                if (isset($_POST['description']) && $_POST['description'] !== "") {
                
                            $result = false;
                            $this->setFlashMessage('Aucun enregistrement ne correspond', 'error');
                            if (isset($_GET['id'])) {
                                // $id = $_GET['id'];
                                $result = Books::update(
                                    $_GET['id'],
                                    [
                                        'title' => $_POST['title'],
                                        'author' => $_POST['author'],
                                        'type' => $_POST['type'],
                                        'description' => $_POST['description'],
                                    ]
                                );
                            }
                            if ($result) {
                                $this->setFlashMessage("Votre Livre a été bien modifié", "success");
                                // $this->index();
                                header('Location: /?controller=book');
                            }
                        }
                    }
                }
            }
        }

        $id = $_GET['id'];
        $book = Books::getById($id);
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('updateBook.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page BookController',
            'book' => $book,
        ]);
    }
    
}
