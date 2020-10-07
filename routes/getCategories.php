<?php 

use Controller\CategoryController;
session_start();
$categoryController = new CategoryController($_SESSION['admin']['username']);

$categories = $categoryController->getCategories();


?>