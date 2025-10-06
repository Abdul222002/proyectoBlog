
<?php

//Añadir Articulo
if(isset($_POST['title']) && isset($_POST['text'])){
    $title = $_POST['title'];
    $text = $_POST['text'];
    $author = $_SESSION['user']->getUsername();
    PostRepository::addPost($title, $text, $author);
}

// Mostrar Añadir Articulo
 if(isset($_GET['a']) && $_GET['a']=='addpost'){
        require_once('views/addarticle.phtml');
        exit();
    }

//Cargar los posts en un array 
if (!isset($_GET["id"])) {
    $posts = PostRepository::getAllPosts();
    require_once 'views/article.phtml';
} else {
    $post = PostRepository::getPostById($_GET["id"]);
    require_once 'views/showarticle.phtml';
}

?>