<?php

namespace Vivi\PDO\Controller;

use Vivi\PDO\Entity\Books;
use Vivi\PDO\Kernel\Views;
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


    public function delete()
    {
        $result = false;
        $this->setFlashMessage('Aucun enregistrement ne correspond', 'error');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = Books::delete($id);
        }
        if ($result) {
            $this->setFlashMessage("L'enregistrement a bien été supprimé", "success");
        }
        $this->index();
        
    }

    public function edit()
    {
        $id = Books::getById($_GET['id']);

        if (isset($_POST['submit'])) {
            // var_dump($_POST['description']);
            echo 'hello';
            if (isset($_POST['title']) && $_POST['title'] !== "") {
                echo 'hello';
                if (isset($_POST['author']) && $_POST['author'] !== "") {
                    echo 'hello';
                    if (isset($_POST['type']) && $_POST['type'] !== "") {
                        echo 'hello';
                        if (isset($_POST['description']) && $_POST['description'] !== "") {
                            echo 'hello';

                            $result = false;
                            $this->setFlashMessage('Aucun enregistrement ne correspond', 'error');
                            if (isset($_GET['id'])) {
                                // $id = $_GET['id'];
                                $result = Books::update(
                                    $id,
                                    [
                                        'title' => $_POST['title'],
                                        'author' => $_POST['author'],
                                        'type' => $_POST['type'],
                                        'description' => $_POST['description'],
                                    ]
                                );
                            }
                            if ($result) {
                                $this->setFlashMessage("Votre compte a été bien modifié", "success");
                                $this->index();
                            }
                        }
                    }
                }
            }
        }

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('updateBook.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page BookController',
            'book' => $id,
        ]);
    }
}
