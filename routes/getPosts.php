<?php

use Controller\PostController;

$postController = new PostController();
if (isset($_POST['query']))
    $posts = $postController->getPosts($_POST['query']);
else
    $posts = $postController->getPosts();
