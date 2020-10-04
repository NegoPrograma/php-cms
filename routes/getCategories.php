<?php 

include_once('../controllers/CategoryController.php');

$categoryController = new CategoryController();
$categories = $categoryController->getCategories();


?>