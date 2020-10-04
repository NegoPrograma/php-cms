<?php 
include_once('../controllers/CategoryController.php');


$categoryController = new CategoryController($_POST['category_name']);
$categoryController->validateCategory();
$categoryController->setCategory();