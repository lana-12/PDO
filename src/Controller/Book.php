<?php

namespace Vivi\PDO\Controller;

use Vivi\PDO\Entity\Books;
use Vivi\PDO\Kernel\Views;
use Vivi\PDO\Utils\MyFunction;
use Vivi\PDO\Kernel\AbstractController;

class Book extends AbstractController{

    public function index()
    {
        
        $books = Books::getAll();

        //Gestion Error
        if (!$books) {
            http_response_code(404);
            header('Location: /?controller=book');
        }      
        //Total in the DataBase
        $nbrBook = count($books);

        //Nbr element display
        $perPage = 6;

        if(isset($_GET['page'])){
            $currentPage = (int) $_GET['page'] ;
        } else {
            $currentPage = 1;
        }

        // Calcul du nbre de page
        $nbrPerPage = (int) ceil($nbrBook / $perPage);
        //On vérifie
        // var_dump($nbrPerPage);

        //Vérif si page current > au nombre total de page + first page à afficher = 1
        $currentPage = ($currentPage>$nbrPerPage) ? 1 : $currentPage;

        //Display books en function des nombres de page définit dans  $perPage = 5
        $offset = ($currentPage - 1) * $perPage;
        $books = Books::getAll($perPage, $offset );

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('book/book.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'title'=> 'Book',
            'titlePage' => 'Liste des Livres',
            'books'=> $books,
            'currentPage'=> $currentPage,
            'nbrBook' => $nbrBook,
            
        ]);
    }

    public function showBook()
    {
        $id = $_GET['id'];
        $book = Books::getById($id);

        //Gestion Error
        if (!$book) {
            http_response_code(404);
            header('Location: /?controller=book');
        }

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('book/show.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'title' => 'Show Book',
            'titlePage' => 'Détail du livre',
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
        $view->setHtml('book/createBook.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'title' => 'Create Book',

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
        header('Location: /?controller=book');
        
    }

    public function edit()
    {
        $id = $_GET['id'];
        $book = Books::getById($id);

        if (!$book) {
            http_response_code(404);
            header('Location: /?controller=book');
        }

        if (isset($_POST['submit'])) {
            if (isset($_POST['title']) && $_POST['title'] !== "") {
                    if (isset($_POST['author']) && $_POST['author'] !== "") {
                            if (isset($_POST['type']) && $_POST['type'] !== "") {
                                if (isset($_POST['description']) && $_POST['description'] !== "") {
                
                            $result = false;
                            $this->setFlashMessage('Aucun enregistrement ne correspond', 'error');
                            if (isset($id)) {
                                // $id = $id;
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
                                $this->setFlashMessage("Votre Livre a été bien modifié", "success");
                                header('Location: /?controller=book&method=showBook&id='. $id);
                                // $this->index();
                            }
                        }
                    }
                }
            }
        }

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('book/updateBook.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'title' => 'Edit Book',
            'titlePage' => 'Page BookController',
            'book' => $book,
        ]);
    }
    
}
