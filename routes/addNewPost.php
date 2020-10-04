<?php

include_once('../controllers/PostController.php');

$postController = new PostController($_POST['title'],$_POST['content'],$_POST['category'],$_FILES['image']['name']);
$postController->validatePost();
$postController->addPost();
?>