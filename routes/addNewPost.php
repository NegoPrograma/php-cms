<?php
include_once("../vendor/autoload.php");
Use Controller\PostController;
session_start();
$postController = new PostController($_POST['title'],$_POST['content'],$_POST['category'],$_FILES['image']['name'],$_SESSION['admin']['username']);
if($postController->validatePost())
    $postController->addPost();
?>