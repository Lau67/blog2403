<?php

//use App\Appp;
//use App\Table\Categorie;
//use App\Table\Article;

$app = Appp::getInstance();
$post = $app->getTable('Post')->find($_GET['id']);


//$post = Article::find($_GET['id']);
//si le post est vide
if($post === false){
    //Appp::notFound();
    $app->notFound();
}

//pour changer la valeur d'un titre
//Appp::setTitle($post->titre);
$app->title = $post->titre;

//$categorie = Categorie::find($post->categorie_id);

//ou voir suite, à la place de $categorie->titre
//<p><em><?= $categorie->titre; ></em></p>
?>

<h1><?= $post->titre; ?></h1>

<p><em><?= $post->categorie; ?></em></p>



<p><?= $post->contenu; ?></p>

