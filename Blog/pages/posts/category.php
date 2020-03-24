<?php

//class importé et utilisé
//use App\Appp;
//use App\Table\Article;
//use App\Table\Categorie;

$app = Appp::getInstance();

//variables définies
//$categorie = Categorie::find($_GET['id']);
$categorie = $app->getTable('Category')->find($_GET['id']);
if($categorie === false){
    //Appp::notFound();
    $app->notFound();
}
//$articles = Article::LastByCategory($_GET['id']);
$articles = $app->getTable('Post')->LastByCategory($_GET['id']);

//liste des categories sur le côté
//$categories = Categorie::all();
$categories = $app->getTable('Category')->all();
//code html généré
?>


<h1><?= $categorie->titre ?></h1>

<div class="row">
    <div class="col-sm-8">

        <?php foreach($articles as $post): ?>

        
            <h2><a href="<?= $post->url ?>"><?= $post->titre; ?></a></h2>

            <p><em><?= $post->categorie; ?></em></p>
        
            <p><?= $post->extrait; ?></p>

        <?php endforeach; ?>

    </div>

    <div class="col-sm-4">
    
            <ul>
            <?php foreach($categories as $categorie): ?>

                <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>

            <?php endforeach; ?>
            </ul>
    </div>

</div>