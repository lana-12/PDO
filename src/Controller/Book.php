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
        // $books = Books::allPagination();
        $books = Books::getAll();

        //déterminer le nombre en base de données
        $nbrBook = count($books);

        //1. etape
        //Et tjs pour Vérifier(désolée mais il faut vérifier)
        // pour vérifier il affiche le nbre de books en base de données
        // var_dump($nbrBook); //Moi ok

        //On a besoin du nombre d'élément per pages
        // Donc ici c'est pour 5 élément per page

        //2.Etape 
        $perPage = 5;

        //On va récupérer la page
        //var_dump($_GET['page']); // => tu vas l'url du navigateur comme exemple = 
        // ex: http://localhost:3000/index.php?controller=Book&page=6 et tu verra le chiffre   6   
        // Attention c'est une string si tu fais un var_dump(gettype($_GET['page'])) = il y a "string" mais on veut un int
        // Donc on le converti en int puisque qu'il faut un int en argument de la function getAll()

        //$currentPage = intval($_GET['page']);
        //On vérifie
        //var_dump(gettype($currentPage)); //=>int
        //var_dump($currentPage); //C'est un int

        //3. Etape
        // Vérifie Si pas vide ou egal à false
        //Mais tjs protégé les saisies
        // Si pas définit on le remet sur la première page
        // Donc ici on n'a la page courante
        // si tu as une autre solution je prend
        if(isset($_GET['page'])){
            $currentPage = (int) $_GET['page'] ;
        } else {
            $currentPage = 1;
        }

        // Il faut savoir le nombre de page grace au isset
        // Calculer le nbre de page
        // Donc le nombre de entrée en BDD / nbr perPerge
        $nbrPerPage = (int) ceil($nbrBook / $perPage);
        //On vérifie
        // var_dump($nbrPerPage);

        //Tjs vérifié si la page courrent est sup au nombre total de page on lui dit que c'est la prmeière page qu'il faut afficher
        // if($currentPage > $nbrPerPage){
        //     $currentPage = 1;
        // }
        //Sinon si la page courante > nbre de page =1 sinon à la page courante
        $currentPage = ($currentPage>$nbrPerPage) ? 1 : $currentPage;
        // var_dump($currentPage);


        //Afficher les livres en function des nombres de page définit dans         $perPage = 5; Etape 2

        $offset = ($currentPage - 1) * $perPage;


        $books = Books::getAll($perPage, $offset );
        // var_dump($perPage);

        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('book.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page BookController',
            'books'=> $books,
            'currentPage'=> $currentPage,
            'nbrBook' => $nbrBook,
            
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
