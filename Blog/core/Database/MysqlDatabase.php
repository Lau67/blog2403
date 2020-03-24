<?php

namespace core\Database;

use\PDO;

class MysqlDatabase extends Database{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost; port=3306'){
        $this->db_name = $db_name;
        $this->$db_user = $db_user;
        $this->$db_pass = $db_pass;
        $this->$db_host = $db_host;
    }
        //accesseur
    private function getPDO(){

        if($this->pdo ===null){
            //initialiser
        $pdo = new PDO('mysql:dbname=blog;host=localhost; port=3306', 'root', '');
            //définir l'attribut
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             //stocker dans l'instance
        $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement, $class_name = null, $one = false){
        $requete = $this->getPDO()->query($statement);
        if($class_name === null){
            $requete->setFetchMode(PDO::FETCH_OBJ);
        }else{

            $requete->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $datas = $requete->fetch();
        } else {
             $datas = $requete->fetchAll();
        }
        return $datas;


    }

    public function prepare($statement, $attributes, $class_name, $one = false){
        $requete = $this->getPDO()->prepare($statement);
        $requete->execute($attributes);
        $requete->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($one){
            $datas = $requete->fetch();
        } else {
             $datas = $requete->fetchAll();
        }
       
        return $datas;

    }


}