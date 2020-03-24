<?php

namespace core;

class Config{

    private $settings =[];
//instance unique stocké dans variable attribut
    private static $_instance;

/**
 * méthode statique qui permet d'instancier ou de récupérer l'instance unique
**/   
    public static function getInstance($file){
       if(is_null(self::$_instance)){
           self::$_instance = new Config($file);
       }
       
        return self::$_instance;

    }
/**
 * Le constrcuteur avec sa logique est privé pour émpêcher l'instanciation en dehors de la classe
**/
//$file: fichier à charger dans constructeur
    public function __construct($file){
        //génère une clé unique
        //$this->id = uniqid();
        //chemin d'accès
        //$this->settings = require dirname(__DIR__) . '/config/config.php';
        $this->settings = require($file);
    }

/**
    *  Permet d'obtenir la valeur de la configuration
    *  @param $key string clef à récupérer
    *  @return mixed
 **/

    public function get($key)
    {
        if(!isset($this->settings[$key])){
            return null;
        }

        return $this->settings[$key];
    }

}