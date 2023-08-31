<?php

namespace Vivi\PDO\Kernel;

use PDO;
use PDOException;

use Vivi\PDO\Entity\Model;
use Vivi\PDO\Interface\Log;
use Vivi\PDO\Configuration\Config;



class DataBase extends PDO implements Log{

    private static $instance = null;

    private function __construct()
    {
        $dsn = 'mysql:dbname=' . Config::DBNAME . ';host=' . CONFIG::DBHOST;

        try {
            parent::__construct($dsn, CONFIG::DBUSER, CONFIG::DBPASS);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_CLASS);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $e = sprintf("[%s] : %s ligne %s", $e->getMessage(), $e->getFile(), $e->getLine()) . PHP_EOL;
            $this->createlogger('Error : ' . $e);
            echo 'Oups !!! Une erreur est survenue';
            die();
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    

    public function createlogger(string $message): void
    {
        if (!is_dir('src/Kernel/Logger/DataBase')) {
            mkdir('src/Kernel/Logger/DataBase', 0777, true);
        }
        file_put_contents('src/Kernel/Logger/DataBase/' . date('Y-d-m') . '.log', $message . PHP_EOL, FILE_APPEND);
    }
    


}