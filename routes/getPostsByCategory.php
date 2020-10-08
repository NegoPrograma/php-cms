<?php

use Controller\PostController;

$postController = new PostController();
$postsByCategory = $postController->getPostsByCategory($_GET['category']);
