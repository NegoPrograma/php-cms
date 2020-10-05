<?php 

use Controller\CategoryController;

$categoryController = new CategoryController();
$categories = $categoryController->getCategories();


?>