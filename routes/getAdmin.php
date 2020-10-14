<?php 
use Controller\AdminController;
$AdminController = new AdminController();

$admin = $AdminController->getAdmin($_GET['username']);


?>