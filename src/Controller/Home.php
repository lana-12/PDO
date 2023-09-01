<?php

namespace Vivi\PDO\Controller;

use Vivi\PDO\Entity\Books;
use Vivi\PDO\Entity\Users;
use Vivi\PDO\Kernel\Views;
use Vivi\PDO\Utils\MyFunction;
use Vivi\PDO\Kernel\AbstractController;


class Home extends AbstractController{

    public function index()
    {
        $view = new Views();
        
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('index.php');
        $view->setFooter('footer.html');


        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page HomeController',
        ]);
    }

}