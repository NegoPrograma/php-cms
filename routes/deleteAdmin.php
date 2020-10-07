<?php
include_once("../vendor/autoload.php"); 
use Controller\AdminController;
session_start();
$AdminController = new AdminController();

$admins = $AdminController->deleteAdmin($_GET['id'],$_SESSION['admin']['username']);


?>