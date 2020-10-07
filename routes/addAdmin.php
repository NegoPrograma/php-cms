<?php
session_start();
include_once("../vendor/autoload.php");
Use Controller\AdminController;

$adminController = new AdminController($_POST['username'],$_POST['nickname'],$_POST['password'],$_POST['password-confirm'],$_SESSION['admin']['username']);
if($adminController->validateAdmin())
    $adminController->setAdmin();
?>