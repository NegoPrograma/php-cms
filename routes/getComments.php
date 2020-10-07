<?php

use Controller\CommentController;

$commentController = new CommentController();
$comments;
if(isset($_GET['id']))
    $comments = $commentController->getCommentsById($_GET['id']);
    else
    $comments = $commentController->getComments();