<?php
 include_once("../controllers/PostController.php");
 $postController = new PostController();
 $posts = $postController->getPosts();
?>