<?php

use Controller\PostController;

$postController = new PostController();
$posts = $postController->getPostsByCategory($_GET['category']);
