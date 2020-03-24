<?php

use core\Config;
use core\Database\MysqlDatabase;

class Appp{

    //titre du site   
    public $title = "Mon site :)";
    private $db_instance;
    private static $_instance;

    public static function getInstance(){
        //si l'instance est nul on la créé
        if(is_null(self::$_instance)){
            self::$_instance = new Appp();

        }
        return self::$_instance;
    }

    public static function load(){
        session_start();
        require ROOT . '/app/autoloader.php';
        App\autoloader::register();
        require ROOT . '/core/autoloader.php';
        core\autoloader::register();
    }


    public static function getTable($name){   
        $class_name = '\app\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDatabase());
    }

    public function getDatabase(){
        $config = Config::getInstance(ROOT . '/config/config.php');
        //si db_instance nul je le stocke dans mon instance
        if(is_null($this->db_instance)){
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host') );
        }
        return $this->db_instance;

    }

}



