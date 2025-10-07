<?php

//cargar modelo
require_once('models/User.php');
require_once('models/Post.php');
require_once('models/PostRepository.php');
require_once('models/LoginRepository.php');
require_once('models/CommentRepository.php');
require_once('models/Coment.php');


session_start();
$db = Connection::connect();

// cargar vista
if(isset($_GET['c'])){
    require_once('controllers/'.$_GET['c'].'Controller.php');
}else{
    if(isset($_SESSION['user'])&& $_SESSION['user']){
    require_once('controllers/articleController.php');
}else{
    require_once('controllers/loginController.php');
}
}


