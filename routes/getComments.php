<?php

use Controller\CommentController;

$commentController = new CommentController();
$comments = $commentController->getComments($_GET['id']);
