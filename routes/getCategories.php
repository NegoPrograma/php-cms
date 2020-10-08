<?php 
//include_once("../vendor/autoload.php");
if(session_status() != PHP_SESSION_ACTIVE)
    session_start();
use Controller\CategoryController;
$categoryController = new CategoryController();

$categories = $categoryController->getCategories();


?>