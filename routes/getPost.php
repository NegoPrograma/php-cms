<?php

use Controller\PostController;

$postController = new PostController();
$post = $postController->getPost($_GET['id']);
