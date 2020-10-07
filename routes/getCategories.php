<?php 
include_once("../vendor/autoload.php");
use Controller\CategoryController;
$categoryController = new CategoryController($_SESSION['admin']['username']);

$categories = $categoryController->getCategories();


?>