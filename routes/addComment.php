<?php
include_once("../vendor/autoload.php");
Use Controller\CommentController;

$commentController = new CommentController($_POST['name'],$_POST['email'],$_POST['comment']);
if($commentController->validateComment($_GET['id']))
    $commentController->addComment($_GET['id']);
?>