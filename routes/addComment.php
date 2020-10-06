<?php
include_once("../vendor/autoload.php");
Use Controller\CommentController;

$commentController = new CommentController($_POST['name'],$_POST['email'],$_POST['comment']);
if($commentController->validateComment())
    $commentController->addComment();
?>