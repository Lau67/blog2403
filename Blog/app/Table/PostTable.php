<?php

namespace app\Table;

use core\Table\Table;

class PostTable extends Table{

    protected $table = 'articles';


    /**
    * Récupère les derniers articles
    * @return array
    */


    public function last(){
        return $this->query ("
            SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
      
            ORDER by articles.date DESC ");
    }


    /**
    * Récupère les derniers articles de la categorie demandée
    * @param $category_id int
    * @return array
    */

    public function lastbyCategory($category_id){
        return $this->query ("
        SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        WHERE articles.category_id = ?
        ORDER by articles.date DESC", [$category_id]
       );
    }


        /* WHERE articles.id = ? */

     /**
    * Récupère un article en liant la categorie associée
    * @param $id int
    * @return \app\Entity\PostEntity
    */


    public function find($id){
        return $this->query ("
            SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            WHERE articles.id = ?", [$id], true
           );
    }

}