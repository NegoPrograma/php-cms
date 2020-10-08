<?php

use Controller\PostController;

$postController = new PostController();
$posts = "";
$recentPosts = [];
if (isset($_POST['query'])){
    $posts = $postController->getPosts($_POST['query']);
    $recent = $postController->getPosts();
    for ($i=0; $i < 5; $i++) { 
        $recentPosts[]=$recent[$i];
    }
    unset($recent);
}
else
    $posts = $postController->getPosts();
