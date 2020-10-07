<?php
include_once("../vendor/autoload.php");
Use Controller\CommentController;
session_start();
$CommentController = new CommentController();
    $CommentController->deleteComment($_GET['id']);
?>