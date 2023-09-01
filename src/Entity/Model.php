<?php

namespace Vivi\PDO\Entity;

use PDO;
use Vivi\PDO\Kernel\DataBase;
use Vivi\PDO\Utils\MyFunction;


class Model  {

    public static $className;

    private static function getEntityName()
    {
        $classname = static::class;
        $tab = explode('\\', $classname);
        $entity = $tab[count($tab) - 1];
        return $entity;
    }

    private static function getClassName()
    {
        return static::class;
    }

    // private static function Execute($sql)
    // {
    //     $pdostatement = DataBase::getInstance()->query($sql);
    //     return $pdostatement->fetchAll(\PDO::FETCH_CLASS, self::getClassName());
    // }

private static function Execute($sql, array $attributes =null)
    {
        $db = DataBase::getInstance();

        if($attributes !==null){
            $query = $db->prepare($sql);
            $query->execute($attributes);
            // $query->fetchAll(\PDO::FETCH_CLASS, self::getClassName());
            return $query;


        } else {
            return $db->query($sql);
        }
    }


    public static function getAll()
    {
        $sql = "select * from " . self::getEntityName();
        return self::Execute($sql)->fetchAll(\PDO::FETCH_CLASS, self::getClassName());
    }



    public static function getById(int $id)
    {
        $sql = "select * from " . self::getEntityName() . " where id=$id";
        $result =  self::Execute($sql)->fetchAll(\PDO::FETCH_CLASS, self::getClassName());
        //Comme fetchAll [0] on récupère le premier élément sinon c'est $result
        return $result[0];
    }



    public static function findNotesByUser()
    {
        $sql = "SELECT notes.id, notes.note, users.id as users
            FROM notes
            LEFT JOIN users
            on user_id= users.id
            
        ";
        // var_dump($sql);
        return self::Execute($sql);
    }


    // public static function insert(array $datas)
    // {
    //     $sql = "insert into " . self::getEntityName() . " values (NULL,";
    //     $count = count($datas);
    //     $i = 1;
    //     foreach ($datas as $data) {
    //         if ($i < $count) {
    //             $sql .= "'$data',";
    //         } else {
    //             $sql .= "'$data'";
    //         }
    //         $i++;
    //     }
    //     $sql .= ")";
    //     return DataBase::getInstance()->exec($sql);
    // }

    public static function create($data)
    {
        $db = Database::getInstance();
        $sql = "INSERT INTO " . self::getEntityName() . "(title, author, type, description) VALUES (:title, :author, :type, :description)";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindParam(':author', $data['author'], PDO::PARAM_STR);
        $stmt->bindParam(':type', $data['type'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);

        return $stmt->execute();
    }


    public static function delete(int $id)
    {
        $sql = "delete from " . self::getEntityName() . " where id= ?";
        return self::Execute($sql, [$id]);
    }

    public static function update(int $id, array $data)
    {

        $db = Database::getInstance();
        $sql = "UPDATE " . self::getEntityName() . " SET title= :title, author= :author, type= :type, description = :description WHERE id= :id";
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':title', $data['title'],PDO::PARAM_STR);
        $stmt->bindValue(':author', $data['author'],PDO::PARAM_STR);
        $stmt->bindValue(':type', $data['type'],PDO::PARAM_STR);
        $stmt->bindValue(':description', $data['description'],PDO::PARAM_STR);
        $stmt->bindValue(':id', $id ,PDO::PARAM_STR);

        return $stmt->execute();
    }


        
}