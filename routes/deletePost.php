<?php
include_once("../vendor/autoload.php");
use Controller\PostController;

$postController = new PostController();
$post = $postController->deletePost($_GET['id']);
