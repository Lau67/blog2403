<?php

/*session_start();
require '../app/Autoloader.php';
App\Autoloader::register();
*/
define('ROOT', dirname(__DIR__));
require ROOT . '/app/Appp.php';
Appp::load();
//$app = Appp::getInstance();
//$posts = $app->getTable('Posts');
// p c'est page
if(isset($_GET['p'])){
    $page = $_GET['p'];
} else {
    $page = 'home';
}


ob_start();
if($page === 'home'){
    require ROOT . '/pages/posts/home.php';
} elseif ($page === 'posts.category'){
    require ROOT . '/pages/posts/category.php';
} elseif ($page === 'posts.show'){
    require ROOT . '/pages/posts/show.php';
}

$content = ob_get_clean();
require ROOT . '/pages/templates/default.php';


//$app = Appp::getInstance();

/*
$db = new \app\Database('blog');
$posts = new \app\Table\PostsTable($db);
*/

//$posts = $app->getTable('Posts');
//$posts->all();

//$posts = $app->getTable('Categories');


?>






<?php

/*



//initialisation des objets
//$db = new App\Database('blog');

//tout ce qui sera affiché sera stocké dans la variable $content
ob_start();
if($p === 'home'){
    require '../pages/home.php';
} elseif ($p === 'article'){
    require '../pages/single.php';
} elseif ($p === 'categorie'){
    require '../pages/categorie.php';
}

$content = ob_get_clean();
require '../pages/templates/default.php'
*/



