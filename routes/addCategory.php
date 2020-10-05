<?php 
include_once("../vendor/autoload.php");
Use Controller\CategoryController;


$categoryController = new CategoryController($_POST['category_name']);
$categoryController->validateCategory();
$categoryController->setCategory();

?>