<?php 
include_once("../vendor/autoload.php");
Use Controller\CategoryController;
session_start();

$categoryController = new CategoryController($_SESSION['admin']['username']);
$categoryController->deleteCategory($_GET['id']);

?>