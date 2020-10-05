<?php
include_once("../vendor/autoload.php");
Use Controller\PostController;

$postController = new PostController($_POST['title'],$_POST['content'],$_POST['category'],$_FILES['image']['name']);
$postController->validatePost();
$postController->addPost();
?>