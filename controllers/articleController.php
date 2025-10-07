
<?php

//Eliminar Comentario
if(isset($_GET['deleteComment']) && $_GET['deleteComment']==true ){
    $id = $_GET['idComment'];
    $postId = $_GET['postId'];
    // Comprobar que el usuario que intenta borrar el comentario es el autor del mismo
    $comment = CommentRepository::getCommentById($id);
    if($_SESSION['user']->getId() === $comment->getAuthorId()->getId()) {     
        CommentRepository::deleteComment($id);
    }
    header('Location:index.php?c=article&id='.$postId);
    exit();
}

//Añadir Articulo
if(isset($_POST['title']) && isset($_POST['text'])){
    $title = $_POST['title'];
    $text = $_POST['text'];
    $author = $_SESSION['user']->getId();
    PostRepository::addPost($title, $text, $author);
}

//Eliminar Articulo
if(isset($_GET['delete']) && $_GET['delete']==true && isset($_GET['id'])){
    $id = $_GET['id'];
    PostRepository::deletePost($id);
    header('Location:index.php?c=article');
    exit();
}

//Añadir Comentario
if(isset($_POST['text']) && isset($_GET['id'])){
    $postId = $_GET['id'];
    $authorId = $_SESSION['user']->getId();
    $text = $_POST['text'];
    CommentRepository::addComment($postId, $authorId, $text);
    header('Location:index.php?c=article&id='.$postId);
    exit();
}


// Mostrar Añadir Comentario
if(isset($_GET['addComment']) && $_GET['addComment']==true && isset($_GET['id'])){
    require_once('views/addcomments.phtml');
    exit();
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